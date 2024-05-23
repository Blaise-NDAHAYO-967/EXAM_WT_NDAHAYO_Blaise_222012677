<?php
// Include the database connection file
include('database_connection.php');

// Check if service_id is set
if (isset($_REQUEST['service_id'])) {
    $t_id = $_REQUEST['service_id'];

    $stmt = $connection->prepare("SELECT * FROM services WHERE service_id=?");
    $stmt->bind_param("i", $t_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['service_id'];
        $y = $row['name'];
        $z = $row['description'];
          $z = $row['price'];
    
    } else {
        echo "services not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update services</title>
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
        <h2><u>Update Form of services</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="name">name:</label>
            <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>" required>
            <br><br>

            <label for="description">description:</label>
            <input type="text" name="description" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="price">price:</label>
            <input type="text" name="price" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
             
  $t_id = $_POST['service_id'];
         $n = $_POST['name'];
        $d = $_POST['description'];
         $p= $_POST['price'];
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $n = $_POST['name'];
    $d  = $_POST['description'];
      $p  = $_POST['price'];
   
    // Update the services in the database
    $stmt = $connection->prepare("UPDATE services SET name=?, description=?,price=? WHERE service_id=?");
    $stmt->bind_param("ssis", $n, $d, $p,$t_id);
    $stmt->execute();

    // Redirect to services.php
    header('Location: services.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
