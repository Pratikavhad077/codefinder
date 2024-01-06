<?php

// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the table
if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];
    
    // SQL query to search for banks
    $sql = "SELECT * FROM bank3 WHERE bankname LIKE '%$search_term%'";
}

// Execute the query
$result = $conn->query($sql);

// Check if there are rows returned
if ($result) {
    // Output data of each row
    echo '<div style="background-color: #f2f2f2; padding: 20px; border-radius: 10px;">'; // Styling for the container

    while ($row = $result->fetch_assoc()) {
        echo '<div style="margin-bottom: 20px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">'; // Styling for each row

        echo '<h2 style="color: #333;">Bank Name: ' . $row["bankname"] . '</h2>';
        echo '<p><strong>Branch:</strong> ' . $row["Branch"] . '</p>';
        echo '<p><strong>Location:</strong> <a href="' . $row["Location"] . '" target="_blank" style="color: #007bff; text-decoration: none;">' . $row["Location"] . '</a></p>';
        echo '<p><strong>District:</strong> ' . $row["District"] . '</p>';
        echo '<p><strong>State:</strong> ' . $row["State"] . '</p>';
        echo '<p><strong>IFSC Code :</strong> ' . $row["IFSCCode"] . '</p>';

        echo '</div>';
    }

    echo '</div>';
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();

?>

