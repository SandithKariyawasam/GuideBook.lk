<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dblanka";

$con = new mysqli($servername, $username, $password, $database);

// Getting data from HTML form
$provinceId = mysqli_real_escape_string($con, $_REQUEST["province_id"]);
$districtName = strtoupper(mysqli_real_escape_string($con, $_REQUEST["district_name"]));

// Select district from database
$select_district = "SELECT district_name FROM district WHERE district_name = '$districtName'";
$result = $con->query($select_district);

// Checking if the selected district is already recorded
if ($result->num_rows > 0) {
    echo "This District is already recorded.";
} else {
    // Inserting the district into the database
    $pr = "INSERT INTO district (district_name, province_id) VALUES ('$districtName', '$provinceId')";
    if ($con->query($pr) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error on recording new data." . $con->error;
    }
}

// Closing the connection
$con->close();
?>
