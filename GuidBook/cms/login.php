<?php
$alert="";
if(isset($_GET['alert'])){
	$message=$_GET['alert'];
	if($message=='error'){
		$alert="<b>Username or Password Not mached!</b>";
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
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="../aditional/images/favicon.png">

    </head>
    <body>

<div class="showcase">
    <div class="video-container">
        <video src="../aditional/video/bg.mp4" autoplay muted loop id="myVideo"></video>
    </div>

</div>

        <div class="container">
            <div class="box form-box">

                <header>Login</header>
                <form action="validation.php" method="post">
				    <div class="links">
						<?php echo $alert; ?>
						<br/>
                    </div>
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="Email" autocomplete="off" required>
                    </div>
    
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
    
                    <div class="field">
                        <input type="submit" class="btn" name="login_btn" value="Login" required>
                    </div>
                    <div class="links">
                        Only Dynamo admins can add places
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>