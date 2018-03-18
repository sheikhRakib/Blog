<?php
	session_start();

	if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != "TRUE" ) {
		header("location: login.php");
		exit();
	}
	$userName = $_SESSION['userName'];
	if(isset($_POST['submitPost'])) {
   		$xml = new SimpleXMLElement("xml/blogs.xml",null, true);
	   	
	   	$blog = $xml->addChild("blog", null);
	   	$blog->addAttribute('id', count($xml));
		$blog->addChild("title",$_POST['title']); //title from form
		$a = $_SESSION['fullName'];
		$blog->addChild("auther",$a); // from session value
		$a = $_SESSION['userName'];
		$blog->addChild("authorUserName",$a); //from session value
		$blog->addChild("description",$_POST['description']);
		$blog->addChild("details",$_POST['details']);
		$tags = $blog->addChild("tags",null);
		$tags->addChild("tag",$_POST['tag1']);
		$tags->addChild("tag",$_POST['tag2']);
		$tags->addChild("tag",$_POST['tag3']);
		$xml->asXml("xml/blogs.xml");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Profile | Blog</title>
	<meta charset="utf-8">
	<style type="text/css">
		h1 
		{
			background-color: #114fb2; 
			color: white;
			text-align: center;
			font-size: 50px
		}
		li
		{
			list-style-type: none;
		}
		a
		{
			text-decoration: none;
			color: #313742;
			font-size: 30px;
		}
		a:hover
		{
			color: #9fb0cc;
		}

	</style>
</head>
<body>
	<?php
		if (isset($_SESSION['fullName'])) {
			$a = $_SESSION['fullName'];
			echo "<h1>welcome $a</h1>";
		}
	?>
	<form method="post" action="logout.php">
		<input type="submit" name="logout" value="Logout">
	</form>
	<div style="text-align: center;">
		<a href="#post">Post a Blog </a>
		<span style="font-size: 30px;">||</span> 
		<a href="#list"> My Blog List</a>
	</div>
	<hr>
	<div id="post" align="center">
		<h3>Add a Post</h3>
		<form method="post" action="">
			<li><input type="text" name="title" placeholder="title" style="font-size: 20px;"></li>
			<li><textarea rows="4" cols="50" name="description" placeholder="write short descriotion."></textarea></li>
			<li><textarea rows="10" cols="80" name="details" placeholder="write your post here."></textarea></li>
			<li>
				<input type="text" name="tag1" placeholder="tag1">
				<input type="text" name="tag2" placeholder="tag2">
				<input type="text" name="tag3" placeholder="tag3">
			</li>
			<input type="submit" name="submitPost" value="Post">
		</form>
	</div>
	<div id="list">
		<?php
			$dom = simplexml_load_file("xml/blogs.xml");
			foreach($dom->blog as $blog) {
				if ($blog->authorUserName == $userName) {
					$id = $blog->attributes()->{'id'};
					echo "<div class='news'>";
					echo "<h2 class='news_headline'>$blog->title</h2>";
					echo "<div>";
					echo "<p style='margin: 0;'>$blog->description";
					echo "</p></div>";
					echo "<div style='border:none;cursor: pointer;width: 70px;'><form method='get' action='article.php'>";
					echo "<input type='hidden' name='article' value='$id'><input type='submit' name='readbtn' value='read>>'></form>";
					echo "</div></div>";
				}
			}
		?>
	</div>
</body>
</html>