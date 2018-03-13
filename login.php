<?php
    session_start();
   	$userName="";
   	$password="";
   	$errors = array();
   	
	$XMLname = "";
	$XMLpassword = "";
	$XMLfullname = "";

	
   	if(isset($_POST['submit']))
   	{
	   	$userName = $_POST['userName'];
	   	$password = $_POST['password'];
	   
	   	// if (empty($userName)) {
	   	// 	array_push($errors, "Username required");
	   	// }
	   	// if (empty($password)) {
	   	// 	array_push($errors, "Password required");
	   	// }
	   	//if (count($errors) == 0) {
	   		$userLogin = new SimpleXMLElement("xml/userInfo.xml",null, true);
			foreach($userLogin->user as $user)
			{
				$XMLname = $user->username;
				$XMLpassword = $user->password;
				$XMLfullname = $user->fullName;

				if($userName==$XMLname && md5($password)==$XMLpassword)
				{
					$_SESSION["un"] = $userName;
					$_SESSION['fisrtn'] = $XMLfullname;
					$_SESSION['flag'] = "TRUE";
					
					header("location: profile.php");
					session_write_close();
					exit();
				}
			}//end of foreach
	   	//}
	}
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
						<input class="input_box" type="text" name="userName" placeholder="username" autocomplete="off">
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