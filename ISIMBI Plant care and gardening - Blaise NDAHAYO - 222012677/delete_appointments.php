<?php
// Include the database connection file
include('database_connection.php');

// Check if appointment_id is set
if (isset($_REQUEST['appointment_id'])) {
    $a_id = $_REQUEST['appointment_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM appointments WHERE appointment_id=?");
    $stmt->bind_param("i",$a_id);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <style>
            body {
                background-color: #f0f8ff; 
                color: #333333; 
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background-color: #fafad2; /* Light Goldenrod Yellow */
                padding: 20px;
                border: 2px solid #4682b4; /* Steel Blue */
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #2e8b57; /* Sea Green */
            }
            p {
                color: #6a5acd; /* Slate Blue */
            }
            input[type="submit"] {
                background-color: #ff4500; /* Orange Red */
                color: #ffffff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #ff6347; /* Tomato */
            }
        </style>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Delete Record</h1>
            <form method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="a_id" value="<?php echo htmlspecialchars($a_id); ?>">
                <input type="submit" value="Delete">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($stmt->execute()) {
                    echo "<p>Record deleted successfully.</p>";
                } else {
                    echo "<p>Error deleting data: " . htmlspecialchars($stmt->error) . "</p>";
                }
            }
            ?>
        </div>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "appointment_id is not set.";
}

$connection->close();
?>
  