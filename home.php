<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Home | Blog</title>
	<meta charset="utf-8">
	<style type="text/css">
		body
		{
			background-color: #efefef;
			width:100%;
			margin:0;
			padding: 0;
		}
		#main_div
		{
			width: 60%;
			margin: auto;
		}
		ul 
		{
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		}
		a{text-decoration: none;}
		.login_reg
		{
			float: right;
			display: block;
			text-align: center;
			margin: 0px;
			padding: 0px;
		}
		.log_reg_btn
		{
			padding: 3px 10px;
			font-size: 15px;
			color: #000000;
		}
		.log_reg_btn:hover{background-color: #ffffff;}
		#top_logo
		{
			background-color: #ffffff;
			padding: 0px;
			margin: 0px;

		}

		#menubar
		{
			background-color: #757357;
			position: sticky;
			top: 0;
		}
		#menubar_ul {padding: 10px 20px;size: 100%;}	
		.bar_item
		{
		    float: left;
		    display: block;
		    text-align: center;
		    
		}
		.bar_btn
		{
			padding: 20px 16px;
			color: white;
			font-family:Verdana;
			font-size: 20px;
		}
		.bar_btn:hover{background-color: #96947c;}
		#search_box
		{
			float:right;
			font-size: 15px;
			padding: 5px 10px;
			border-radius: 4px;
			margin-top: 70px;
			margin-right: 10px;
		}
		#search_btn
		{
			background-image: url('img/search.png');
			border:none;
			background-repeat:no-repeat;
			margin-top: 70px;
			margin-right: 10px;
			padding: 8px 15px;
			background-size:100% 100%;
			cursor: pointer;
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
	</style>
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
				<input id="search_btn" style="float: right" type="submit" name="searchbtn" value="" onclick="alert('clicked')">
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
		<div style="background-color: #ffffff;margin-top: 0;">
			<?php
			$dom = simplexml_load_file("xml/blogs.xml");
			foreach($dom->blog as $blog)
			{
				echo "<h2>$blog->title</h2>";
				echo "<p>$blog->description<a href='login.php'> continue reading...</a></p>";
				//echo "<h4>Facilities:</h4>"."<br>";
				
				//foreach($h->Facilities->facility as $f){
				//	echo "<li>".$f->fName."</li>";
					
				//}
				//echo "<h4>Address:</h4>"."<br>";
				//	echo $h->address."<br>";
				//	echo $h->Distance."<br>"."<br>";
				
				//foreach($h->Available as $av){		
				//	if($av=="True"){
				//		echo "<h4>ROOM Available: YES</h4>"."<br>"."<br>"."<br>"."<br>"; 
				//	}
				//	else echo "<h4>ROOM Available: NO</h4>"."<br>"."<br>"."<br>"."<br>";
				//}
			}
			?>
		</div>














	</div>
	<div class="foot"><?php  include "footer.php";?></div>
</body>
</html>