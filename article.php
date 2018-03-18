<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Article | Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>
	<div id="main_div">
		<!--this division is for login and registration purpose-->
		<div>
			<ul>
				<li class="login_reg"><a class="log_reg_btn" href="login.php">Login</a></li>
				<li class="login_reg"><a class="log_reg_btn" href="registration.php">registration</a></li>
			</ul>
		</div>
		<!--Logo-->
		<div id="top_logo">
			<a href="index.php"><img src="img/blog.png" width="130px" height="80px"></a>
			<div style="float:right;">
				<input id="search_btn" style="float: right" type="submit" name="searchbtn" value="Go" onclick="alert('clicked')">
				<input id="search_box" type="text" name="searchBox" placeholder="search">
				
			</div>
			<p style="font-family:'Segoe UI';font-size: 20px;margin: 0px;">ONE OF THE WORLD'S LARGEST BLOG SITE</p>
		</div>
		<div id="menubar">
			<!--sticky menu bar-->
			<ul id="menubar_ul">
				<li class="bar_item"><a class="bar_btn" href="home.php">Feed</a></li>
	  			<li class="bar_item"><a class="bar_btn" href="profile.php">Profile</a></li>
			  	<li class="bar_item"><a class="bar_btn" href="#contact">New Article</a></li>
			</ul>
		</div>

		<div id="newspage_div" style="font-size: 30px;">
			<?php
		$xml = simplexml_load_file('xml/blogs.xml');

		if(isset($_GET['readbtn']))
		{
		   	$articleID = $_GET['article'];

		   	if (empty($articleID)) {
		   		echo "no news found";
		   		exit;
		   	}
		   	else
		   	{
		   		foreach ($xml->blog as $blog) {
					$id = $blog->attributes()->{'id'};
					if ($id == $articleID) {
						echo "<h2 style='margin-top: 0px;padding-top: 20px;'>$blog->title</h2>";	
						echo "<p>$blog->details</p>";
					}
				}
		   	}
		}
	?>
		</div>
	</div>
	<div class="foot"><?php  include "footer.php";?></div>
</body>
</html>