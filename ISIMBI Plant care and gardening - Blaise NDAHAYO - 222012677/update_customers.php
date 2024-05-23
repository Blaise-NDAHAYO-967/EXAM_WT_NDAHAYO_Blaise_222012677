<?php
// Include the database connection file
include('database_connection.php');

// Check if customer_id is set
if (isset($_REQUEST['customer_id'])) {
    $c_id = $_REQUEST['customer_id'];

    $stmt = $connection->prepare("SELECT * FROM customers WHERE customer_id=?");
    $stmt->bind_param("i", $c_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['customer_id'];
        $y = $row['name'];
        $z = $row['email'];
         $z = $row['phone_number'];
    } else {
        echo "customers not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update customers</title>
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
        <h2><u>Update Form of customers</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="name">name:</label>
            <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>" required>
            <br><br>

            <label for="email">email:</label>
            <input type="text" name="email" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
             <label for="phone_number">phone_number:</label>
            <input type="text" name="phone_number" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
 $ = $_POST['customer_id'];
        $n = $_POST['name'];
        $e = $_POST['email'];
         $p_number = $_POST['phone_number'];
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $n = $_POST['name'];
    $e  = $_POST['email'];
    $p_number = $_POST['phone_number'];

    // Update the customers in the database
    $stmt = $connection->prepare("UPDATE customers SET name=?, email=?,phone_number=? WHERE customer_id=?");
    $stmt->bind_param("ssis", $n, $e, $p_number,$c_id);
    $stmt->execute();

    // Redirect to customers.php
    header('Location: customers.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
