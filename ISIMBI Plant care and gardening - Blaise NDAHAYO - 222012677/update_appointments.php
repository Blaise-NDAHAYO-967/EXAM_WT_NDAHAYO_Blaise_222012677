<?php
// Include the database connection file
include('database_connection.php');

// Initialize variables
$a_id = $customer_id = $gardener_id = $appointment_date = $duration_minutes = $created_at = $updated_at = '';

// Check if appointment_id is set
if (isset($_REQUEST['appointment_id'])) {
    $a_id = $_REQUEST['appointment_id'];

    $stmt = $connection->prepare("SELECT * FROM appointments WHERE appointment_id=?");
    $stmt->bind_param("i", $a_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customer_id = $row['customer_id'];
        $gardener_id = $row['gardener_id'];
        $appointment_date = $row['appointment_date'];
        $duration_minutes = $row['duration_minutes'];
        $created_at = $row['created_at'];
        $updated_at = $row['updated_at'];
    } else {
        echo "Appointment not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Appointments</title>
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
        <h2><u>Update Form of Appointments</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <input type="hidden" name="appointment_id" value="<?php echo htmlspecialchars($a_id); ?>">
            
            <label for="customer_id">Customer ID:</label>
            <input type="number" name="customer_id" value="<?php echo htmlspecialchars($customer_id); ?>" required>
            <br><br>

            <label for="gardener_id">Gardener ID:</label>
            <input type="number" name="gardener_id" value="<?php echo htmlspecialchars($gardener_id); ?>" required>
            <br><br>

            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" value="<?php echo htmlspecialchars($appointment_date); ?>" required>
            <br><br>

            <label for="duration_minutes">Duration (minutes):</label>
            <input type="number" name="duration_minutes" value="<?php echo htmlspecialchars($duration_minutes); ?>" required>
            <br><br>

            <label for="created_at">Created At:</label>
            <input type="datetime-local" name="created_at" value="<?php echo isset($created_at) ? date('Y-m-d\TH:i', strtotime($created_at)) : ''; ?>" required>
            <br><br>

            <label for="updated_at">Updated At:</label>
            <input type="datetime-local" name="updated_at" value="<?php echo isset($updated_at) ? date('Y-m-d\TH:i', strtotime($updated_at)) : ''; ?>" required>
            <br><br>

            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    // Retrieve updated values from form
    $a_id = $_POST['appointment_id'];
    $customer_id = $_POST['customer_id'];
    $gardener_id = $_POST['gardener_id'];
    $appointment_date = $_POST['appointment_date'];
    $duration_minutes = $_POST['duration_minutes'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];

    // Update the appointment in the database
    $stmt = $connection->prepare("UPDATE appointments SET customer_id=?, gardener_id=?, appointment_date=?, duration_minutes=?, created_at=?, updated_at=? WHERE appointment_id=?");
    $stmt->bind_param("iissssi", $customer_id, $gardener_id, $appointment_date, $duration_minutes, $created_at, $updated_at, $a_id);
    $stmt->execute();

    // Redirect to appointments.php
    header('Location: appointments.php');
    exit();
}
$connection->close();
?>
