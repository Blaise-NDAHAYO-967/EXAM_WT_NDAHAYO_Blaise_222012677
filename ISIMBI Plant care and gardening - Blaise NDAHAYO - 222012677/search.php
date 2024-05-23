<?php
// Include the database connection file
include('database_connection.php');

// Check if search term is provided
if (isset($_GET['query'])) {
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Perform the search query for appointments
    $sql_appointments = "SELECT * FROM appointments WHERE duration_minutes LIKE '%$searchTerm%'";
    $result_appointments = $connection->query($sql_appointments);

    // Perform the search query for careguides
    $sql_careguides = "SELECT * FROM careguides WHERE title LIKE '%$searchTerm%'";
    $result_careguides = $connection->query($sql_careguides);

    // Perform the search query for customers
    $sql_customers = "SELECT * FROM customers WHERE name LIKE '%$searchTerm%'";
    $result_customers = $connection->query($sql_customers);

    // Perform the search query for gardeners
    $sql_gardeners = "SELECT * FROM gardeners WHERE email LIKE '%$searchTerm%'";
    $result_gardeners = $connection->query($sql_gardeners);

    // Perform the search query for plantissues
    $sql_plantissues = "SELECT * FROM plantissues WHERE issue_type LIKE '%$searchTerm%'";
    $result_plantissues = $connection->query($sql_plantissues);

    // Perform the search query for plants
    $sql_plants = "SELECT * FROM plants WHERE plant_type LIKE '%$searchTerm%'";
    $result_plants = $connection->query($sql_plants);


    // Perform the search query for planttypes
    $sql_planttypes = "SELECT * FROM planttypes WHERE description LIKE '%$searchTerm%'";
    $result_planttypes = $connection->query($sql_planttypes);

    // Perform the search query for reviews
    $sql_reviews = "SELECT * FROM reviews WHERE comment LIKE '%$searchTerm%'";
    $result_reviews = $connection->query($sql_reviews);
    // Perform the search query for services
    $sql_services = "SELECT * FROM services WHERE name LIKE '%$searchTerm%'";
    $result_services = $connection->query($sql_services);

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";
    
    // Display appointments
    echo "<h3>appointments:</h3>";
    if ($result_appointments->num_rows > 0) {
        while ($row = $result_appointments->fetch_assoc()) {
            echo "<p>" . $row['duration_minutes'] . "</p>";
        }
    } else {
        echo "<p>No appointments found matching the search term: " . $searchTerm . "</p>";
    }

    // Display careguides
    echo "<h3>careguides:</h3>";
    if ($result_careguides->num_rows > 0) {
        while ($row = $result_careguides->fetch_assoc()) {
            echo "<p>" . $row['title'] . "</p>";
        }
    } else {
        echo "<p>No careguides found matching the search term: " . $searchTerm . "</p>";
    }

    // Display customers
    echo "<h3>customers:</h3>";
    if ($result_customers->num_rows > 0) {
        while ($row = $result_customers->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No customers found matching the search term: " . $searchTerm . "</p>";
    }

    // Display gardeners
    echo "<h3>gardeners:</h3>";
    if ($result_gardeners->num_rows > 0) {
        while ($row = $result_gardeners->fetch_assoc()) {
            echo "<p>" . $row['email'] . "</p>";
        }
    } else {
        echo "<p>No gardeners found matching the search term: " . $searchTerm . "</p>";
    }
    // Display plantissues
    echo "<h3>plantissues:</h3>";
    if ($result_plantissues->num_rows > 0) {
        while ($row = $result_plantissues->fetch_assoc()) {
            echo "<p>" . $row['issue_type'] . "</p>";
        }
    } else {
        echo "<p>No plantissues found matching the search term: " . $searchTerm . "</p>";
    }
    // Display plants
    echo "<h3>plants:</h3>";
    if ($result_plants->num_rows > 0) {
        while ($row = $result_plants->fetch_assoc()) {
            echo "<p>" . $row['plant_type'] . "</p>";
        }
    } else {
        echo "<p>No plants found matching the search term: " . $searchTerm . "</p>";
    }
    // Display planttypes
    echo "<h3>planttypes:</h3>";
    if ($result_planttypes->num_rows > 0) {
        while ($row = $result_planttypes->fetch_assoc()) {
            echo "<p>" . $row['description'] . "</p>";
        }
    } else {
        echo "<p>No planttypes found matching the search term: " . $searchTerm . "</p>";
    }
    // Display reviews
    echo "<h3>reviews:</h3>";
    if ($result_reviews->num_rows > 0) {
        while ($row = $result_reviews->fetch_assoc()) {
            echo "<p>" . $row['comment'] . "</p>";
        }
    } else {
        echo "<p>No reviews found matching the search term: " . $searchTerm . "</p>";
    }
    // Display services
    echo "<h3>services:</h3>";
    if ($result_services->num_rows > 0) {
        while ($row = $result_services->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No services found matching the search term: " . $searchTerm . "</p>";
    }

    // Close the database connection
    $connection->close();
} else {
    echo "No search term was provided.";
}
?>
