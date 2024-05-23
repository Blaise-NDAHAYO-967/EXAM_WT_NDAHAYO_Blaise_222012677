<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gardeners</title>
    <style>
        body {
            background-color: ocean blue;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        header {
            background-color:  blue;
            padding: 20px;
            text-align: center;
        }
        section {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            background-color: mediumslateblue;
        }
        footer {
            text-align: center;
            padding: 15px;
            background-color: burlywood;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 10px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .search-form {
            text-align: right; /* Adjusted to right but within normal flow */
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center; /* Centered navigation links */
        }
        ul li {
            display: inline;
            margin-right: 10px;
        }
        ul li a {
            padding: 1px;
            color: white;
            background-color: skyblue;
            text-decoration: none;
            margin-right: 1px;
        }
        /* Updated styles for settings menu */
        .dropdown-content a {
            display: block;
            padding: 5px 10px;
            color: #333; /* Updated color */
            text-decoration: none;
        }
        .dropdown-content a:hover {
            background-color: #ddd; /* Updated hover background color */
        }
    </style>
</head>
<body>
<header>
    <!-- Search Form now right above the navigation links -->
    <form class="search-form" role="search" action="search.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <ul>
     
     <img src="logo.JPEG" alt="Logo" height="50" width="50">  
        <!-- List of Navigation Links -->
        <li style="display: inline; margin-right: 1px;"><a href="./HOME.html" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">HOME</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./CONTACT.html" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">CONTACT</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./ABOUT.html" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">ABOUT</a></li>

        <li style="display: inline; margin-right: 1px;"><a href="./appointments.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">appointments</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./careguides.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">careguides</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./customers.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">customers</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./gardeners.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">gardeners</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./plantissues.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">plantissues</a></li>
         <li style="display: inline; margin-right: 1px;"><a href="./plants.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">plants</a></li>
        <li style="display: inline; margin-right: 1px;"><a href="./planttypes.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">planttypes</a></li>
         <li style="display: inline; margin-right: 1px;"><a href="./reviews.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">reviews</a></li>
         <li style="display: inline; margin-right: 1px;"><a href="./services.php" style="padding: 1px; color: white; background-color: grey; text-decoration: none; margin-right: 1px;">services</a></li>
        <!-- Dropdown Settings Menu -->
        <li class="dropdown">
            <a href="#">SETTINGS</a>
            <div class="dropdown-content">
                <a href="register.html" style="background-color: #ff6347;">Register</a>
                <a href="login.html" style="background-color: #00bfff;">Login</a>
                <a href="logout.php" style="background-color: #228b22;">Logout</a>
            </div>
        </li>
    </ul>
</header>

<section>
    <h1>gardeners Form</h1>
    <form method="post" action="gardeners.php">
        <!-- Form Fields -->
        <label for="gardener_id">gardener_id:</label>
        <input type="number" id="gardener_id" name="gardener_id" required><br><br>
        <label for="first_name">first_name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <label for="last_name">last_name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
         <label for="email">email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="phone_number">phone_number:</label>
        <input type="number" id="phone_number" name="phone_number" required><br><br>
         <label for="experience_years">experience_years:</label>
        <input type="text" id="experience_years" name="experience_years" required><br><br>
         <label for="location">location:</label>
        <input type="text" id="location" name="location" required><br><br>
         <label for="specialization">specialization:</label>
        <input type="text" id="specialization" name="specialization" required><br><br>
         <label for="certifications">certifications:</label>
        <input type="text" id="certifications" name="certifications" required><br><br>
        
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>
    <a href="./home.html">Go Back to Home</a>
    <!-- PHP Code for Database Interaction -->
    <?php
    include('database_connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        $stmt = $connection->prepare("INSERT INTO gardeners (gardener_id, first_name, last_name,email,phone_number,experience_years,location,specialization,certifications) VALUES (?, ?, ?,?,?,?,?,?,?)");
        $stmt->bind_param("issssssss", $g_id, $f_name,$l_name,$e,$p_number,$e_years,$l,$sp,$cer);
        $g_id = $_POST['gardener_id'];
        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
         $e = $_POST['email'];
         $p_number = $_POST['phone_number'];
          $e_years = $_POST['experience_years'];
        $l = $_POST['location'];
        $sp = $_POST['specialization'];
         $cer = $_POST['certifications'];
        
        
        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        $stmt->close();
    }
    $sql = "SELECT * FROM gardeners";
    $result = $connection->query($sql);
    ?>
    <!-- Data Display Table -->
    <center><h2>Table of gardeners</h2></center>
    <table>
        <tr>
            <th>gardener_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
             <th>phone_number</th>
            <th>experience_years</th>
            <th>specialization</th>
            <th>specialization</th>
            <th>certifications</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row["gardener_id"]}</td>
                    <td>{$row["first_name"]}</td>
                     <td>{$row["last_name"]}</td>
                    <td>{$row["email"]}</td> 
                     <td>{$row["phone_number"]}</td>
                      <td>{$row["experience_years"]}</td>
                    <td>{$row["specialization"]}</td>
                     <td>{$row["specialization"]}</td>
                    <td>{$row["certifications"]}</td> 
                     
            
                    <td><a href='delete_gardeners.php?gardener_id={$row["gardener_id"]}'>Delete</a></td> 
                    <td><a href='update_gardeners.php?gardener_id={$row["gardener_id"]}'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        $connection->close();
        ?>
    </table>
</section>
<footer>
  <marquee><i style="color: yellow;">&copy; 2024</i><i style="color: blue;" ><b>WEB TECHNOLOGY CAT DESIGNED BY:NDAHAYO blaise</b></marquee>
</footer>
</body>
</html>

