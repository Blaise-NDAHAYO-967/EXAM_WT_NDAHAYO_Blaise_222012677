<?php
// Include the database connection file
include('database_connection.php');

// Check if issue_id is set
if (isset($_REQUEST['issue_id'])) {
    $iss_id = $_REQUEST['issue_id'];

    $stmt = $connection->prepare("SELECT * FROM plantissues WHERE issue_id=?");
    $stmt->bind_param("i",$iss_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['issue_id'];
        $y = $row['plant_id'];
        $z = $row['issue_type'];
         $x = $row['description'];
        $y = $row['solution'];
    } else {
        echo "plantissues  not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update plantissues</title>
    <style>
        body {
            background-color: deepskyblue; 
            color: red; /* Dark gray text */
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
        <h2><u>Update Form of plantissues</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="plant_id">plant_id:</label>
            <input type="number" name="plant_id" value="<?php echo isset($y) ? $y : ''; ?>" required>
            <br><br>

            <label for="issue_type">issue_type :</label>
            <input type="text" name="issue_type" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="description">description :</label>
            <input type="text" name="description" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="solution">solution :</label>
            <input type="text" name="solution" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            

       
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $p_id = $_POST['plant_id'];
    $iss_type  = $_POST['issue_type'];
     $d = $_POST['description'];
    $sl  = $_POST['solution'];
    


    // Update the plantissues  in the database
    $stmt = $connection->prepare("UPDATE plantissues SET plant_id=?, issue_type=?,description=?,solution=? WHERE issue_id=?");
    $stmt->bind_param("ssiss", $p_id, $iss_type, $d,$sl,$iss_id);
    $stmt->execute();

    // Redirect to plantissues.php
    header('Location: plantissues.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
