<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>plantissues</title>
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
                <a href="register.html" style="background-color: greenyellow;">Register</a>
                <a href="login.html" style="background-color: #orangered;">Login</a>
                <a href="logout.php" style="background-color: #228b22;">Logout</a>
            </div>
        </li>
    </ul>
</header>

<section>
    <h1>plantissues Form</h1>
    <form method="post" action="plantissues.php">
        <!-- Form Fields -->
        <label for="issue_id">issue_id:</label>
        <input type="number" id="issue_id" name="issue_id" required><br><br>
         <label for="issue_id">plant_id:</label>
        <input type="number" id="plant_id" name="plant_id" required><br><br>
        <label for="issue_type">issue_type:</label>
        <input type="text" id="issue_type" name="issue_type" required><br><br>
        <label for="description">description:</label>
        <input type="text" id="description" name="description" required><br><br>
        <label for="solution">solution:</label>
        <input type="text" id="solution" name="solution" required><br><br>
         
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>
    <a href="./home.html">Go Back to Home</a>
    <!-- PHP Code for Database Interaction -->
    <?php
    include('database_connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        $stmt = $connection->prepare("INSERT INTO plantissues (issue_id, plant_id, issue_type,description,solution) VALUES (?, ?, ?,?,?)");
        $stmt->bind_param("issss", $iss_id, $p_id,$iss_type,$d,$sl);
        $iss_id = $_POST['issue_id'];
         $p_id = $_POST['plant_id'];
        $iss_type = $_POST['issue_type'];
         $d = $_POST['description'];
         $sl = $_POST['solution'];
        
        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        $stmt->close();
    }
    $sql = "SELECT * FROM plantissues";
    $result = $connection->query($sql);
    ?>
    <!-- Data Display Table -->
    <center><h2>Table of plantissues</h2></center>
    <table>
        <tr>
            <th>issue_id</th>
            <th>plant_id</th>
            <th>issue_type</th>
            <th>description</th>
             <th>solution</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row["issue_id"]}</td>
                   <td>{$row["plant_id"]}</td>
                     <td>{$row["issue_type"]}</td>
                    <td>{$row["description"]}</td> 
                     <td>{$row["solution"]}</td>
                      
                    <td><a href='delete_plantissues.php?issue_id={$row["issue_id"]}'>Delete</a></td> 
                    <td><a href='update_plantissues.php?issue_id={$row["issue_id"]}'>Update</a></td> 
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

