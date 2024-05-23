<?php
// Include the database connection file
include('database_connection.php');

// Check if gardener_id is set
if (isset($_REQUEST['gardener_id'])) {
    $g_id = $_REQUEST['gardener_id'];

    $stmt = $connection->prepare("SELECT * FROM gardeners WHERE gardener_id=?");
    $stmt->bind_param("i", $g_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['gardener_id'];
        $y = $row['first_name'];
        $z = $row['last_name'];
         $x = $row['email'];
        $y = $row['phone_number'];
        $z = $row['experience_years'];
          $x = $row['location'];
        $y = $row['specialization'];
        $z = $row['certifications'];
    } else {
        echo "gardeners  not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update gardeners</title>
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
        <h2><u>Update Form of gardeners</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="first_name">first_name:</label>
            <input type="text" name="first_name" value="<?php echo isset($y) ? $y : ''; ?>" required>
            <br><br>

            <label for="last_name">last_name :</label>
            <input type="text" name="last_name" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="email">email :</label>
            <input type="text" name="email" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="phone_number">phone_number :</label>
            <input type="text" name="phone_number" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="experience_years">experience_years :</label>
            <input type="text" name="experience_years" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
             <label for="location">location :</label>
            <input type="text" name="location" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="specialization">specialization :</label>
            <input type="text" name="specialization" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>
            <label for="certifications">certifications :</label>
            <input type="text" name="certifications" value="<?php echo isset($z) ? $z : ''; ?>" required>
            <br><br>

        
            <input type="submit" name="up" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $f_name = $_POST['first_name'];
    $l_name  = $_POST['last_name'];
     $e = $_POST['email'];
    $p_number  = $_POST['phone_number'];
    $e_years = $_POST['experience_years'];
    $l  = $_POST['location'];
     $sp = $_POST['specialization'];
    $cer = $_POST['certifications'];


    // Update the progress notes in the database
    $stmt = $connection->prepare("UPDATE gardeners SET first_name=?, last_name=?,email=?,phone_number=?,experience_years=?,location=?,specialization=?,certifications=? WHERE gardener_id=?");
    $stmt->bind_param("ssissssss", $f_name, $l_name, $e,$p_number,$e_years,$l,$sp,$cer,$g_id);
    $stmt->execute();

    // Redirect to gardeners.php
    header('Location: gardeners.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
$connection->close();
?>
