<?php
include('database/connection.php');
if(isset($_GET['cat'])){
  $category_id=$_GET['cat'];
}
else{
  $category_id=0;
}
if(isset($_GET['city'])){
  $city_id=$_GET['city'];
}
else{
  $city_id=0;
}
?>
<!DOCTYPE html>
<html lang="eng">

<head>

    <style>
      ul li span 
         {
           font-weight: bold;
           color:#7a7a7a;
         }
    </style>

<meta charset="utf-8">
<title>GuidBook.lk</title>
<link rel="icon" type="image/x-icon" href="aditional/images/favicon.png">

<!-- Bootstrap core CSS -->
<link href="aditional/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->

<link rel="stylesheet" href="aditional/css/style.css">

</head>

<body>

<!-- ***** Header Area Start ***** -->

<?php
    include('nav.php');
  ?>

  <!-- ***** Header Area End ***** -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Places near to you</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
  <div class="row">
    <div class="col-12">
      <br><br>
      <div class="row">
        <div class="col-4">
        <label for="province" class="form-label">Select province:</label>
                     
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

        <div class="col-4">
        <div id="getdis">
                      <label for="dis" class="form-label">Select district:</label>
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

        <div class="col-4">
        <div id="getcity">
                      <label for="city" class="form-label"><b>Select the city:</b></label>
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
      </div>
    </div>
</div><br/><br/>
    <div class="row">
    <div class="col-4">
    <h5>You looking for</h5>
                  <form class="plcform" action="#">
                    <input type="Radio" id="place" name="placce" value="hospital" onclick="window.location.href='places.php?cat=1&'">
                    <label for="place1"> Hospital</label><br>
                    <input type="Radio" id="place" name="placce" value="pharmacy" onclick="window.location.href='places.php?cat=4&'">
                    <label for="place2"> Pharmacy</label><br>
                    <input type="Radio" id="place" name="placce" value="fualstation" onclick="window.location.href='places.php?cat=2&'">
                    <label for="place3"> Fual station</label><br>
                    <input type="Radio" id="place" name="placce" value="foodcity" onclick="window.location.href='places.php?cat=5&'">
                    <label for="place3"> Food city</label><br>
                    <input type="Radio" id="place" name="placce" value="resturent" onclick="window.location.href='places.php?cat=3&'">
                    <label for="place3">Resturent</label><br>
                    <input type="Radio" id="place" name="placce" value="atm" onclick="window.location.href='places.php?cat=6&'">
                    <label for="place3">ATM</label><br>
                </form>
    </div>
    
    
    <div class="col-6">
    <?php
     if($category_id==0){
      $sql_places="SELECT * FROM  place WHERE city_id=$city_id";

     }
     elseif($city_id==0){
      $sql_places="SELECT * FROM  place WHERE category_id=$category_id";
    }
    elseif($city_id==0 AND $category_id==0){
      $sql_places="SELECT * FROM  place";
    }
    else{
      $sql_places="SELECT * FROM  place WHERE category_id=$category_id AND city_id=$city_id";
    }
      $res_places=mysqli_query($conn,$sql_places);
      while($row_places=mysqli_fetch_array($res_places)){
    ?>
                <h4><?php echo $row_places['place_name']; ?></h4>
                 <ul class="detail">
                    <li class="detail-li"><span>Address: </span><?php echo $row_places['place_address']; ?></li>
                    <?php if($row_places['place_telephone']!=null){ ?>
                    <li class="detail-li"><span>Contact: </span><?php echo $row_places['place_telephone']; ?></li>
                    <?php } ?>
                    <li class="detail-li"><span>Location: </span><a href="<?php echo $row_places['place_location']; ?>" target="_blank"><?php echo $row_places['place_location']; ?></a></li>
                 </ul>

                    <br><hr><br>
    <?php } ?> 
    </div>

  </div>
</div>   
  
    <!-- footer in -->
    <?php
    include('footer.php');
    ?>
    <!--footer out-->
    
<script src="aditional/js/jquery-3.7.0.min.js"></script>
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

   $('body').on('change','#city',function(){
        window.location.replace("places.php?cat=<?php echo $category_id;?>&city="+$('#city').val());
   });
});

</script>

<script src="aditional/js/custom.js"></script>
</body>
</html>