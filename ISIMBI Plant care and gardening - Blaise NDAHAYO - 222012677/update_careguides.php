<?php
// Include the database connection file
include('database_connection.php');

// Initialize variables
$g_id = $p_id = $t = $created_at = $updated_at = '';

// Check if guide_id is set
if (isset($_REQUEST['guide_id'])) {
    $t_id = $_REQUEST['guide_id'];

    $stmt = $connection->prepare("SELECT * FROM careguides WHERE guide_id=?");
    $stmt->bind_param("i", $t_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $g_id = $row['guide_id'];
        $p_id = $row['plant_id'];
        $t = $row['title'];
        $created_at = $row['created_at'];
        $updated_at = $row['updated_at'];
    } else {
        echo "Care guide not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update careguides</title>
    <style>
        /* Styles */
    </style>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this care guide?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2><u>Update Form of careguides</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="plant_id">Plant ID:</label>
            <input type="number" name="plant_id" value="<?php echo htmlspecialchars($p_id); ?>" required>
            <br><br>

            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($t); ?>" required>
            <br><br>

            <label for="created_at">Created At:</label>
            <input type="datetime-local" name="created_at" value="<?php echo date('Y-m-d\TH:i', strtotime($created_at)); ?>" required>
            <br><br>

            <label for="updated_at">Updated At:</label>
            <input type="datetime-local" name="updated_at" value="<?php echo date('Y-m-d\TH:i', strtotime($updated_at)); ?>" required>
            <br><br>
            
            <input type="hidden" name="guide_id" value="<?php echo htmlspecialchars($g_id); ?>">
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $g_id = $_POST['guide_id'];
    $p_id = $_POST['plant_id'];
    $t = $_POST['title'];
    $c_at = $_POST['created_at'];
    $u_at = $_POST['updated_at'];
   
    // Update the careguides in the database
    $stmt = $connection->prepare("UPDATE careguides SET plant_id=?, title=?, created_at=?, updated_at=? WHERE guide_id=?");
    $stmt->bind_param("isssi", $p_id, $t, $c_at, $u_at, $g_id);
    $stmt->execute();

    // Redirect to careguides.php
    header('Location: careguides.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
