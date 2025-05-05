<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dblanka";

$conn = new mysqli($servername, $username, $password, $database);

// Getting data from HTML form
$category = strtoupper(mysqli_real_escape_string($conn, $_REQUEST["category_name"]));

// Check if the category is already existing
$select_category = "SELECT category_name FROM category WHERE category_name = '$category'";
$result = $conn->query($select_category);

// If the category is already existing, echo a message
if ($result->num_rows > 0) {
    echo "Record is already recorded.";
} else {
    // Insert the category into the category table
    $se = "INSERT INTO category (category_name) VALUES ('$category')";
    if ($conn->query($se) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error on recording code." . $conn->error;
    }
}

// Closing the connection
$conn->close();
?>
