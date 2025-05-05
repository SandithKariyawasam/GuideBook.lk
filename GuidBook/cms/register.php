<?php
$alert="";


	if(isset($_POST['reg_btn'])){
		include('../database/connection.php');
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$con_password=$_POST['confirm_password'];
		if($password==$con_password)
		{
			$hash_password=sha1($con_password);
			$reg_sql="INSERT INTO  user (user_name,user_email,user_password,user_roll_id,user_enable)
			VALUES('$username','$email','$hash_password',3,0)";
			if(mysqli_query($conn,$reg_sql)){
				$alert="User Registered!";
			}
			else
			{
				$alert="Error!";
			}
		}
		else
		{
			$alert="Password Not mached!";
		}
		}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <title>register</title>
        <link rel="icon" type="image/x-icon" href="../aditional/images/favicon.png">

    </head>
    <body>

    <div class="showcase">
              <div class="video-container">
                  <video src="../assets/video/reg.mp4" autoplay muted loop id="myVideo"></video>
              </div>
    </div>
        <div class="container">
            <div class="box form-box">

                <header>Register Form</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="Email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>
					
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="enter password" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="re-enter password"  autocomplete="off" required>
                    </div>
    
                    <div class="field input">
                        <input type="submit" class="btn" name="reg_btn" value="Register Now" required>
                    </div>
                    <div class="links">
                        Alredy a member? <a href="login.php" class="log-now">Log now</a>
                    </div>
					<div class="links">
                        <?php echo $alert; ?>
                    </div>
                </form>
            </div> 
        </div>
    </body>
</html>