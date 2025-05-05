<?php
    $server = 'localhost';
    $username = "root";
    $password = "";
    $database = "dblanka";

    $con = new mysqli($server, $username, $password, $database);
    
    //getting variable values from html form
    $province = mysqli_real_escape_string($con,$_REQUEST["province_name"]);

    //check province is alredy existing or not
    $select_province = "select province_name from province where province_name = '$province'";
    $result = $con->query($select_province);

    if ($result->num_rows > 0){
        //then record is alredy existed.
        echo "Record is alredy recorded.";
    } else {
        //adding province into province table
        $se = "insert into province(province_name) values('$province')";
        if ($con->query($se) === TRUE) {
            echo "Record added successfully!";
        } else {
            echo "error on recording code.".$con->error;
        }
    }

    //closing connection
    $con->close();
?>