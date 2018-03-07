<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Login | Blog</title>
	<meta charset="utf-8">
	<style type="text/css">
		body
		{
			background-color: #efefef;
			width:100%;
			margin:0;
			padding: 0;
		}
		#login
		{		
			background-color: #ffffff;
			border:1px solid #dddddd;
			width: 25%;
			padding: 20px;
			margin: auto;
			margin-top: 150px;
			text-align: center;
		}
		.input_box
		{
			margin: 10px 2px;
			font-size: 20px;
			padding: 5px;
			width: auto;
		}
		.btn_submit:hover
		{
			background-color: #47d194;
		}
		.btn_submit
		{
			padding: 6px 12px;
			font-size: 20px;
			cursor: pointer;
			border: 1px solid transparent;
			border-radius: 4px;
			color: #fff;
			background-color: #2e9b6c;
			border-color: #27825a;
		}
		.foot
		{
			width: 100%;
			color: #ffffff;
			background-color: #282E28;
			position: fixed;
			text-align: center;
			bottom: 0px;

		}
		
		a{text-decoration: none; color: #334e7a;}
		a:hover {text-decoration: none; color: #5f97ef;}
		
		table{width: 100%;}
	</style>
	
</head>
<body>
	<div id="login">
		<div>
			<a href="index.php"><img src="img/blog.png" width="130px" height="80px"></a>
			<hr>
		</div>
		<div>
			<p>Login with your Blog username.</p>
			<br>
			<form action="/" method="post">
			<table>
				<tr>
					<td>
						<input class="input_box" type="text" name="UserName" placeholder="username" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<input class="input_box" type="password" name="Password" placeholder="password">	
					</td>
				</tr>
				<tr>
					<td>
						<input class="btn_submit" type="submit" value="Log In">
					</td>
				</tr>
				<tr>
					<td>
						<br>
						<a href="forgotpassword.php">Can’t access your account?</a>
					</td>
				</tr>
			</table>
			</form>

		</div>
	</div>
	<div class="foot"><?php  include "footer.php";?></div>
	

</body>
</html>