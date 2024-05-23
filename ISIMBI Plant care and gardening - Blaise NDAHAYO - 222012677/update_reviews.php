<?php
// Include the database connection file
include('database_connection.php');

// Check if review_id is set
if (isset($_REQUEST['review_id'])) {
    $r_id = $_REQUEST['review_id'];

    $stmt = $connection->prepare("SELECT * FROM reviews WHERE review_id=?");
    $stmt->bind_param("i", $r_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['review_id'];
        $y = $row['appointment_id'];
        $z = $row['comment'];
    
    } else {
        echo "reviews not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update reviews</title>
    <style>
        body {
            background-color: deepskyblue; 
            color: red; 
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: red; /* Light Goldenrod Yellow */
            padding: 20px;
            border: 2px solid #4682b4; /* Steel Blue */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: black; /* Sea Green */
        }
        label {
            color: black; /* Slate Blue */
        }
        input[type="submit"] {
            background-color: yellow; 
            color: blue;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }
        input[type="submit"]:hover {
            background-color: black; /* Tomato */
        }
    </style>
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <div class="container">
        <h2><u>Update Form of reviews</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="appointment_id">appointment_id:</label>
            <input type="number" name="appointment_id" value="<?php echo isset($y) ? $y : ''; ?>" required>
            <br><br>

            <label for="comment">comment:</label>
            <input type="text" name="comment" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
             
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $a_id = $_POST['appointment_id'];
    $cm  = $_POST['comment'];
   
    // Update the reviews in the database
    $stmt = $connection->prepare("UPDATE reviews SET appointment_id=?, comment=? WHERE review_id=?");
    $stmt->bind_param("ssi", $a_id, $cm, $r_id);
    $stmt->execute();

    // Redirect to reviews.php
    header('Location: reviews.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
