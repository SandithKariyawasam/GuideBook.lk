<?php
    include('../database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/add_style.css">
        <link rel="stylesheet" href="../aditional/css/bootstrap.min.css">
     
        <title>Add places</title>
        <link rel="icon" type="image/x-icon" href="../aditional/images/favicon.png">
        

    </head>
    <body>
        <?php 
            include('navplc.php');
            ?>

<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Add a new place</h4>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <form action="addplc.php" method="post">
  <div class="container text-center">
  <div class="row">
    <div class="col-8"><h5>Select Province</h5></div>
    <div class="col-4">
    <select class="form-control" name="province" id="province">
                       <option>Select Province</option>
                       <?php

                           $sql_province="SELECT * FROM province";
                           $res_province=mysqli_query($conn,$sql_province);
                           while($row_provinces=mysqli_fetch_array($res_province)){
                       ?>
                         <option value="<?php echo $row_provinces['province_id']; ?>"><?php echo $row_provinces['province_name']; ?></option>

                         <?php } ?>
                     </select>

    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-8"><h5>Select District</h5></div>
    <div class="col-4" id="getdis">
    <select class="form-control" name="dis" id="dis">
                      <option>Select District</option>
                      <?php
                            $sql_getdistrict="SELECT * FROM district";
                            $res_getdistrict=mysqli_query($conn,$sql_getdistrict);
                            while($row_getdistrict=mysqli_fetch_array($res_getdistrict)){
                            ?>
                         <option value="<?php echo $row_getdistrict['district_id']; ?>"><?php echo $row_getdistrict['district_name']; ?></option>

                      <?php } ?>
                      </select>

    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-8"><h5>Select City</h5></div>
    <div class="col-4" id="getcity">
    <select class="form-control" name="city" id="city">
                      <option>Select City</option>
                      <?php
                            $sql_getcity="SELECT * FROM city";
                            $res_getcity=mysqli_query($conn,$sql_getcity);
                            while($row_getcity=mysqli_fetch_array($res_getcity)){
                            ?>
                         <option value="<?php echo $row_getcity['city_id']; ?>"><?php echo $row_getcity['city_name']; ?></option>

                      <?php } ?>
                      </select>

    </div>
  </div>

  <br><br>
  <div class="row">
    <div class="col-8"><h5>Select Category</h5></div>
    <div class="col-4">
    <select class="form-control" name="cat" id="cat">
                      <option>Select Category</option>
                      <?php
                            $sql_getcat="SELECT * FROM category";
                            $res_getcat=mysqli_query($conn,$sql_getcat);
                            while($row_getcat=mysqli_fetch_array($res_getcat)){
                            ?>
                         <option value="<?php echo $row_getcat['category_id']; ?>"><?php echo $row_getcat['category_name']; ?></option>

                      <?php } ?>
                      </select>

    </div>
  </div>

  <br><br>
  <div class="row">
    <div class="col-8"><h5>Place Name</h5></div>
    <div class="col-4">
        <div class="form-floating mb-3">
          <input type="text"  name="pname"class="form-control" id="pname" placeholder="Place Name">
          <label for="floatingInput">Place Name</label>
        </div>

    </div>
  </div>

  <br><br>
  <div class="row">
    <div class="col-8"><h5>Place Address</h5></div>
    <div class="col-4">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="address" id="paddress" placeholder="Place Address">
          <label for="floatingInput">Place adress</label>
        </div>

    </div>
  </div>

  <br><br>
  <div class="row">
    <div class="col-8"><h5>Contact Number</h5></div>
    <div class="col-4">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="tel" id="contact" placeholder="Contact number">
          <label for="floatingInput">Contact Number</label>
        </div>

    </div>
  </div>

  <br><br>
  <div class="row">
    <div class="col-8"><h5>Google map link</h5></div>
    <div class="col-4">
        <div class="form-floating mb-3">
          <input type="text" name="gurl" class="form-control" id="contact" placeholder="Google map link">
          <label for="floatingInput">Google map link</label>
        </div>

    </div>
  </div>
<br><br>
  <div align="center"><button type="submit" class="btn btn-primary">Add</button></div>


</div>
</form>
<?php
  include('footerplc.php');
  ?>

<script src="../aditional/js/jquery-3.7.0.min.js"></script>
<script>
$( document ).ready(function() {
   $('#province').change(function(){
    $.post(
					"actions/get_district.php",
					{
					province_id:$('#province').val()
					},
					function (data){
					$('#getdis').html(data);
					});
   });

   $('body').on('change','#dis',function(){
    $.post(
					"actions/get_city.php",
					{
					dis_id:$('#dis').val()
					},
					function (data){
					$('#getcity').html(data);
					});
   });
});

</script>
</body>
</html>