<?php
    session_start();

    if(isset($_POST['submitPost']))
   	{
   		$content=$_POST['blogPost'];
	   	$xml = new SimpleXMLElement("xml/blogs.xml",null, true);
	   	
	   	$blog = $xml->addChild("blog", null);
	   	$blog->addAttribute('id', count($xml));
		$blog->addChild("title","No title");
		$blog->addChild("auther","Mr. NoBody");
		$blog->addChild("description",$content);
		$blog->addChild("details",$content);
			
		$xml->asXml("xml/blogs.xml");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/blog.png">
	<title>Profile | Blog</title>
	<meta charset="utf-8">
</head>

<body>
	<form method="post" action="logout.php"><input type="submit" name="logout" value="Logout"></form>
	<h1 style="text-align: center;background-color: green;">Profile</h1>
	
	<form method="post" action="">
		<textarea name="blogPost" placeholder="write your post here."></textarea>
		<input type="submit" name="submitPost" value="Post">
	</form>
</body>
</html>