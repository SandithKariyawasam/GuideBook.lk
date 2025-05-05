<label for="dis">Select district:</label>
<select class="form-control" name="city" id="city">
<option>Select City</option>
<?php
$dis_id=$_POST['dis_id'];
include('../database/connection.php');
$sql_getcity="SELECT * FROM city WHERE district_id=$dis_id";
$res_getcity=mysqli_query($conn,$sql_getcity);
while($row_city=mysqli_fetch_array($res_getcity)){
?>
 <option value="<?php echo $row_city['city_id']; ?>"><?php echo $row_city['city_name']; ?></option>
<?php
}
?>
</select>