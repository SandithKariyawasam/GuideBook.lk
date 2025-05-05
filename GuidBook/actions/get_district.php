<label for="dis">Select district:</label>
<select class="form-control" name="dis" id="dis">
<option>Select District</option>
<?php
$province_id=$_POST['province_id'];
include('../database/connection.php');
$sql_getdistrict="SELECT * FROM district WHERE province_id=$province_id";
$res_getdistrict=mysqli_query($conn,$sql_getdistrict);
while($row_district=mysqli_fetch_array($res_getdistrict)){
?>
 <option value="<?php echo $row_district['district_id']; ?>"><?php echo $row_district['district_name']; ?></option>
<?php
}
?>
</select>