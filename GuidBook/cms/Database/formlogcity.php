<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dblanka";

$con = new mysqli($servername, $username, $password, $database);

// Getting data from HTML form
$districtId = mysqli_real_escape_string($con, $_REQUEST["district_id"]);
$cityName = strtoupper(mysqli_real_escape_string($con, $_REQUEST["city_name"]));

// Select city from database
$select_city = "SELECT city_name FROM city WHERE city_name = '$cityName'";
$result = $con->query($select_city);

// Checking if the selected city is already recorded
if ($result->num_rows > 0) {
    echo "This city is already recorded.";
} else {
    // Inserting the city into the database
    $pr = "INSERT INTO city (city_name, district_id) VALUES ('$cityName', '$districtId')";
    if ($con->query($pr) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error on recording new data." . $con->error;
    }
}

// Closing the connection
$con->close();
?>
