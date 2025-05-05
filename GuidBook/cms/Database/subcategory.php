<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dblanka";

$con = new mysqli($servername, $username, $password, $database);

// Getting data from HTML form
$CategoryId = mysqli_real_escape_string($con, $_REQUEST["category_id"]);
$subcategoryname = strtoupper(mysqli_real_escape_string($con, $_REQUEST["sub_category_name"]));

// Select district from database
$select_subcategory = "SELECT sub_category_name FROM sub_category WHERE sub_category_name = '$subcategoryname'";
$result = $con->query($select_subcategory);

// Checking if the selected district is already recorded
if ($result->num_rows > 0) {
    echo "This sub-category is already recorded.";
} else {
    // Inserting the sub-category into the database
    $pr = "INSERT INTO sub_category (sub_category_name, category_id) VALUES ('$subcategoryname', '$CategoryId')";
    if ($con->query($pr) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error on recording new data." . $con->error;
    }
}

// Closing the connection
$con->close();
?>
