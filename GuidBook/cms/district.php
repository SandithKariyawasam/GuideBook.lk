<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: 'poppins','sans-serif';
            }

            body{
                background: #e4e9f7;
            }

            .container{
                display: flex;
                min-height: 90vh;
            }

            .box{
                background: #fdfdfd;
                display: flex;
                flex-direction: column;
                padding: 25px 25px;
                border-radius: 20px;
                box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);
            }

            .form-box{
                width: 650px;
                margin: 0px 10px;
            }

            .form-box header{
                font-size: 25px;
                font-weight: 600;
                padding-bottom: 10px;
                border-bottom: 1px solid #e6e6e6;
            }

            .form-box form .field{
                display: flex;
                margin-bottom: 10px;
                flex-direction: column;
            }

            .form-box form .input input{
                height: 40px;
                width: 100%;
                font-size: 16px;
                padding: 0 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
                outline: none;
            }

            .btn{
                height: 35px;
                background: #033266;
                border: 0;
                border-radius: 5px;
                color: #fff;
                font-size: 15px;
                cursor: pointer;
                transition: all .3s;
                margin-top: 10px;
                padding: 0px 10px;
            }

            .btn:hover{
                opacity: 0.82;
            }

            .log-now{
                color: red;
            }

            .add-image{
                color:red;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }

            .log-now:hover{
                opacity: 0.82;
            }

            .submit{
                width: 100%;
            }

            /*______________Home________________*/

            .nav{
                background: #fff;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                line-height: 60px;
                z-index: 100;
            }
            .logo{
                font-size: 25px;
                font-weight: 900;
            }
            .right-links a{
                padding: 0 10px;
            }
            main{
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 60px;
            }
            .main-box{
                display: flex;
                flex-direction: column;
                width: 70%;
            }
            .main-box .top{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .bottom{
                width: 100%;
                margin-top: 20px;
            }
            .message{
                text-align: center;
                background: #f9eded;
                padding: 15px 0px;
                border: 3px solid red;
                border-radius: 5px;
                margin-bottom: 10px;
                font-weight: bold;
                color: rgb(72, 16, 193);
            }
            .message-header{
                color: red;
            }
            @media only screen and (max-width:800px){
                .main-box .top{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .top .box{
                    margin: 10px 10px;
                }
                .bottom{
                    margin-top: 0;
                }
            }
        </style>
        <title>Edit</title>
    </head>
    <body>
        <div class="container">
        
        <!------------------------------------ Adding province -------------------------------------------->
            <div class="box form-box">
            <form action="Database/formlogprovince.php">
                <header>Add Province</header>
                <div class="field input">
                <label for="province_name">Enter Province name:</label>
                <input type="text" name="province_name">
                </div>

                <input type="submit" value="Add" id="submit" class="btn">
            </form>
            </div>
        
        <!------------------------------------ Adding district -------------------------------------------->
            <div class="box form-box">
            <form action="Database/formlogdistrict.php">
                <header>Add District</header>

                <div class="field input">
                <label for="district_name">Enter district name:</label>
                <input type="text" name="district_name"><br>
                </div>

                <div class="field input">
                <label for="chose_province">Select the province containing this district</label>
                <select name="province_id">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "dblanka";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT province_name, province_id FROM province";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $option = "<option value='" . $row['province_id'] . "'>" . $row['province_name'] . "</option>";
                            echo $option;
                        }
                        }
                        mysqli_close($conn);
                    ?>
                </select>
                </div>
                <div class="field input">
                <input type="submit" value="Add" id="submit" class="btn">
                </div>
            </form>
            </div>
        
        <!------------------------------------ Adding city -------------------------------------------->
            <div class="box form-box">
            <form action="Database/formlogcity.php">
                <header>Add city</header>

                <div class="field input">
                <label for="city_name">Enter city name:</label>
                <input type="text" name="city_name"><br>
                </div>

                <div class="field input">
                <label for="chose_province">Select the district containing this city</label>
                <select name="district_id">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "dblanka";

                        $con = mysqli_connect($servername, $username, $password, $dbname);

                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT district_name, district_id FROM district";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $option = "<option value='" . $row['district_id'] . "'>" . $row['district_name'] . "</option>";
                            echo $option;
                        }
                        }
                        mysqli_close($con);
                    ?>
                </select>
                </div>
                <div class="field input">
                <input type="submit" value="Add" id="submit" class="btn">
                </div>
            </form>
            </div>

        <!------------------------------------ Adding category -------------------------------------------->
            <div class="box form-box">
            <form action="Database/category.php">
                <header>Add category</header>
                
                <div class="field input">
                    <label for="category">Enter category name:</label>
                    <input type="text" name="category_name"><br>
                </div>
                <div class="field input">
                    <input type="submit" class="btn" value="Add" id="submit"><br>
                </div>

            </form>
            </div>

        <!------------------------------------ Adding sub-category -------------------------------------------->

            <div class="box form-box">
            <form action="Database/subcategory.php">
                <header>Add sub-category</header>
                
                <div class="field input">
                    <label for="sub_category">Enter sub-category name:</label>
                    <input type="text" name="sub_category_name"><br>
                </div>
                <div class="field input">
                    <input type="submit" class="btn" value="Add" id="submit"><br>
                </div>

                <div class="field input">
                <label for="chose_province">Select the category containing this sub-category</label>
                <select name="category_id">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "dblanka";

                        $con = mysqli_connect($servername, $username, $password, $dbname);

                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT category_name, category_id FROM category";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $option = "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                            echo $option;
                        }
                        }
                        mysqli_close($con);
                    ?>
                </select>
                </div>

            </form>
            </div>

            

        </div>
        
        <script>
            function myFunction() {
                location.reload();
            }

            // Attach the onclick event to the submit button
            document.getElementById("submit").onclick = myFunction;
        </script>
    </body>
</html>