<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <title>GuideBook.lk</title>
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

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to</h6>
            <h2>GuideBook.lk</h2>
            <p>Through this website, you can get information about the location of many things including hospitals, pharmacies, restaurants, hotels and other places of interest around your location.</p>
            
          </div>
        </div>
      </div>
    </div>
  </div>
<!--------------------------------------------------------------------------  -->
<?php
 include('database/connection.php');
?>

<div class="features">
    <div class="container">
      <div class="row">
            <?php
                $sql_getcat="SELECT * FROM category";
                $res_getcat=mysqli_query($conn,$sql_getcat);
                while($row_getcat=mysqli_fetch_array($res_getcat)){
             ?>
        <div class="col-lg-3 col-md-6">
          <a href="places.php?cat=<?php echo $row_getcat['category_id'] ?>&">
            <div class="item">
              <div class="image">
                <img src="aditional/images/cat_img/<?php echo $row_getcat['cat_img'] ?>" alt="" width="90px" height="100">
              </div>
              <h4><?php echo $row_getcat['category_name'] ?></h4>
            </div>
          </a>
        </div>
				<?php } ?>
      </div>
    </div>
  </div>


<!--------------------------------------------------------------------------  -->
  
  
<!-- footer start -->
  <?php
    include('footer.php');
    ?>
<!-- footer stop -->

<script src="aditional/js/custom.js"></script>

  </body>
</html>