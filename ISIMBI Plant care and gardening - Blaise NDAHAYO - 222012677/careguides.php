<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>careguides</title>
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
            background-color: blue;
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
    <h1>careguides Form</h1>
    <form method="post" action="careguides.php">
        <!-- Form Fields -->
        <label for="guide_id">guide_id:</label>
        <input type="number" id="guide_id" name="guide_id" required><br><br>
        <label for="plant_id">plant_id:</label>
        <input type="number" id="plant_id" name="plant_id" required><br><br>
        <label for="title">title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="created_at">created_at:</label>
        <input type="datetime-local" id="created_at" name="created_at" required><br><br>
        <label for="updated_at">updated_at:</label>
        <input type="datetime-local" id="updated_at" name="updated_at" required><br><br>
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>
    <a href="./home.html">Go Back to Home</a>

    <!-- PHP Code for Database Interaction -->
    <?php
    include('database_connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        $stmt = $connection->prepare("INSERT INTO careguides (guide_id, plant_id, title, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $g_id, $p_id, $t, $c_at, $u_at);
        $g_id = $_POST['guide_id'];
        $p_id = $_POST['plant_id'];
        $t = $_POST['title'];
        $c_at = $_POST['created_at'];
        $u_at = $_POST['updated_at'];

        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        $stmt->close();
    }
    $sql = "SELECT * FROM careguides";
    $result = $connection->query($sql);
    ?>
    <!-- Data Display Table -->
    <center><h2>Table of careguides</h2></center>
    <table>
        <tr>
            <th>guide_id</th>
            <th>plant_id</th>
            <th>title</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row["guide_id"]}</td>
                    <td>{$row["plant_id"]}</td>
                    <td>{$row["title"]}</td>
                    <td>{$row["created_at"]}</td>
                    <td>{$row["updated_at"]}</td>
                    <td><a href='delete_careguides.php?guide_id={$row["guide_id"]}'>Delete</a></td>
                    <td><a href='update_careguides.php?guide_id={$row["guide_id"]}'>Update</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        $connection->close();
        ?>
    </table>
</section>
<footer>
  <marquee><i style="color: yellow;">&copy; 2024</i><i style="color: blue;"><b>WEB TECHNOLOGY CAT DESIGNED BY: NDAHAYO blaise</b></i></marquee>
</footer>
</body>
</html>
