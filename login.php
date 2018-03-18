<?php
	session_start();
   	$userName="";
   	$password="";
   	$errors = array();
   	if(isset($_POST['submit']))
   	{
	   	$userName = $_POST['userName'];
	   	$password = $_POST['password'];
      
	   	if (empty($userName)) {
	   		array_push($errors, "Username required");
	   	}
	   	if (empty($password)) {
	   		array_push($errors, "Password required");
	   	}
	   	if (count($errors) == 0) {
	   		if(isValidUser($userName, $password)) {
				header("location: profile.php");
			}
			else {
				array_push($errors, "Wrong username/password");
			}
	   	}
	}
	function isValidUser($name, $password)
	{
		$XMLname = "";
		$XMLpassword = "";
		$XMLfullname = "";

		$userLogin = simplexml_load_file("xml/userInfo.xml");
		foreach($userLogin->user as $user)
		{
			$XMLname = $user->username->__toString();
			$XMLpassword = $user->password->__toString();
			$XMLfullname = $user->fullName->__toString();
			if($name==$XMLname && md5($password)==$XMLpassword)
			{
				$fn = $XMLfullname;
				$_SESSION['userName'] = $name;
				$_SESSION['fullName'] = $fn;
				$_SESSION['loggedIn'] = "TRUE";
				return TRUE;
			}
		}
	}//end of function isVaidUSer

//end php
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Login | Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	
</head>

<body>
	<div id="login">
		<div>
			<!--Header Image-->
			<a href="index.php"><img src="img/blog.png" width="130px" height="80px"></a>
			<hr>
		</div>

		<div>
			<p>Login with your Blog username.</p>
			<br>
			<form action="" method="post">
				<?php  include ("errors.php");?>
			<table>
				<tr>
					<td>
						<input class="input_box" type="text" name="userName" placeholder="username" autocomplete="off" value="<?php echo $userName ?>">
					</td>
				</tr>
				<tr>
					<td>
						<input class="input_box" type="password" name="password" placeholder="password" autocomplete="off">	
					</td>
				</tr>
				<tr>
					<td>
						<input class="btn_submit" type="submit" name="submit" value="Log In">
					</td>
				</tr>
				<tr>
					<td>
						<br>
						<p>
							<a href="registration.php">Not a member?</a> <b>||</b>
							<a href="forgotpassword.php">Can’t access account?</a>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	<?php  include ("footer.php");?>
</body>
</html>