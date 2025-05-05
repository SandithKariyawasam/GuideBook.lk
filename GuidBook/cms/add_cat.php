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
  <form action="addcat.php" method="post" enctype="multipart/form-data">
  <div class="container text-center">
  <div class="row">
    <div class="col-6"><h5>Add Category</h5></div>
    <div class="col-3">
        <div class="form-floating mb-3">
          <input type="text" name="cat"class="form-control" id="pname" placeholder="Place Name">
          <label for="floatingInput">Place Name</label>
        </div>

    </div>

  </div>
  <br><br>
  <div class="row">
      <div class="col-6"><h5>Upload category icon</h5></div>
          <div class="col-3">
            <div class="form-floating mb-3">
               <input type="file" name="file" id="fileToUpload">
            </div>

      </div>
  </div>
<br><br>
  <div class="row">
      <div class="col-6"><h5></h5></div>
          <div class="col-3">
            <div class="form-floating mb-3">
            <div align="left"><button type="submit" class="btn btn-primary">Add</button></div>
            </div>

      </div>
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