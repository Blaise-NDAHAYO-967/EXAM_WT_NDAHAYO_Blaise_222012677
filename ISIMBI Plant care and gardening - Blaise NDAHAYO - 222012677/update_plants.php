<?php
// Include the database connection file
include('database_connection.php');

// Check if plant_id is set
if (isset($_REQUEST['plant_id'])) {
    $p_id = $_REQUEST['plant_id'];

    $stmt = $connection->prepare("SELECT * FROM plants WHERE plant_id=?");
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['plant_id'];
        $y = $row['name'];
        $z = $row['scientific_name'];
        $a = $row['plant_type']; // Correct variable name for plant_type
        $b = $row['description']; // Correct variable name for description
    } else {
        echo "Plant not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Plant</title>
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
            background-color: red;
            padding: 20px;
            border: 2px solid #4682b4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: black;
        }
        label {
            color: black;
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
            background-color: black;
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
        <h2><u>Update Form of Plant</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>" required>
            <br><br>

            <label for="scientific_name">Scientific Name:</label>
            <input type="text" name="scientific_name" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            
            <label for="plant_type">Plant Type:</label>
            <input type="text" name="plant_type" value="<?php echo isset($a) ? $a : ''; ?>" required>
            <br><br>
            
            <label for="description">Description:</label>
            <input type="text" name="description" value="<?php echo isset($b) ? $b : ''; ?>" required>
            <br><br>
           
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $n = $_POST['name'];
    $s_name = $_POST['scientific_name'];
    $p_type = $_POST['plant_type'];
    $d = $_POST['description'];

    // Update the plant in the database
    $stmt = $connection->prepare("UPDATE plants SET name=?, scientific_name=?, plant_type=?, description=? WHERE plant_id=?");
    $stmt->bind_param("ssssi", $n, $s_name, $p_type, $d, $p_id);
    $stmt->execute();

    // Redirect to plants.php
    header('Location: plants.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
