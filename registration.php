<?php
	$userNameReg="";
   	$passwordReg="";
   	$emailReg="";
   	$fullNameReg="";
   	$errors = array();
   	
   	if(isset($_POST['register']))
   	{
   		$fullNameReg=$_POST['fullName'];
	   	$userNameReg=$_POST['userName'];
	   	$passwordReg=$_POST['password'];
	   	$emailReg=$_POST['email'];
	   
	   	if (empty($fullNameReg)) {
	   		array_push($errors, "Full Name required");
	   	}
	   	if (empty($userNameReg)) {
	   		array_push($errors, "Username required");
	   	}
	   	if (empty($passwordReg)) {
	   		array_push($errors, "Password required");
	   	}
	   	if (empty($emailReg)) {
	   		array_push($errors, "Email required");
	   	}

	   	$xml = new SimpleXMLElement("xml/userInfo.xml",null, true);
	   	foreach ($xml as $user) {
			if ($user->username == $userNameReg) {
				array_push($errors, "username already exists");
			}
		}
	   	if (count($errors) == 0) {
			$user = $xml->addChild("user", null);
			$user->addChild("fullName",$fullNameReg);
			$user->addChild("username",$userNameReg);
			$user->addChild("password",md5($passwordReg));
			$user->addChild("email",$emailReg);
			
			$xml->asXml("xml/userInfo.xml");

			header("location: login.php");
	   	}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Registration | Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
	<div style="float:left; width:49%;padding: 10% 0">
		<img src="img/blog.png" width="100%" height="50%">
	</div>
	<div style="float:right; width:50%;">
		<div style="text-align:center;">
			<i><p style="margin-bottom:0;font-size: 380%">BLOG</p></i>
			<p style="margin-top: 0">ONE OF THE WORLD'S LARGEST BLOG SITE</p>
		</div>

		<div id="registration">
			<p>Welcome to the BLOG-WORLD</p>
			<hr>
			<form action="" method="post">
				<?php  include ("errors.php");?>
		   		<li><input class="input_box" type="text" name="fullName" placeholder="full name" value="<?php echo $fullNameReg ?>"></li>
		   		<li><input class="input_box" type="text" name="userName" placeholder="username" value="<?php echo $userNameReg ?>"></li>
		 		<li><input class="input_box" type="password" name="password" placeholder="password"></li>
				<li><input class="input_box" type="email" name="email" placeholder="user@example.com" value="<?php echo $emailReg ?>"></li>
				<li><input class="btn_submit" type="submit" name="register" value="Register"></li>
				<p>Already a member? <a href="login.php">Sign in</a></p>
		 	</form>
		</div>
	</div>
	<?php  include ("footer.php");?>
	
</body>
</html>