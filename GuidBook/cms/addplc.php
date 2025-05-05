<?php
 include('../database/connection.php');

 $province=$_REQUEST['province'];
 $district=$_REQUEST['dis'];
 $city=$_REQUEST['city'];
 $category=$_REQUEST['cat'];
 $pname=$_REQUEST['pname'];
 $address=$_REQUEST['address'];
 $contact=$_REQUEST['tel'];
 $glink=$_REQUEST['gurl'];


 $sql = "INSERT INTO place   (category_id,place_name,city_id,place_address, place_telephone, place_location)
VALUES ($category, '$pname',$city, '$address','$contact', '$glink' )";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>