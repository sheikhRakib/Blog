<?php
	$userName="";
   	$password="";
   	$email="";
   	$fullName="";

   	$errors = array();
   	
   	if(isset($_POST['register']))
   	{
   		$fullName=$_POST['fullName'];
	   	$userName=$_POST['userName'];
	   	$password=$_POST['password'];
	   	$email=$_POST['email'];
	   
	   	if (empty($fullName)) {
	   		array_push($errors, "Full Name required");
	   	}
	   	if (empty($userName)) {
	   		array_push($errors, "Username required");
	   	}
	   	if (empty($password)) {
	   		array_push($errors, "Password required");
	   	}
	   	if (empty($email)) {
	   		array_push($errors, "Email required");
	   	}

	   	$xml = new SimpleXMLElement("xml/userInfo.xml",null, true);
	   	foreach ($xml as $user) {
			if ($user->username == $userName) {
				array_push($errors, "username already exists");
				break;
			}
		}
	   	if (count($errors) == 0) {
			$user = $xml->addChild("user", null);
			$user->addChild("fullName",$fullName);
			$user->addChild("username",$userName);
			$user->addChild("password",md5($password));
			$user->addChild("email",$email);
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
		   		<li><input class="input_box" type="text" name="fullName" placeholder="full name" value="<?php echo $fullName ?>"></li>
		   		<li><input class="input_box" type="text" name="userName" placeholder="username" value="<?php echo $userName ?>"></li>
		 		<li><input class="input_box" type="password" name="password" placeholder="password" value="<?php echo $password ?>"></li>
				<li><input class="input_box" type="email" name="email" placeholder="user@example.com" value="<?php echo $email ?>"></li>
				<li><input class="btn_submit" type="submit" name="register" value="Register"></li>
				<p>Already a member? <a href="login.php">Sign in</a></p>
		 	</form>
		</div>
	</div>
	<?php  include ("footer.php");?>
	
</body>
</html>