<html>
	<head>
		<title>News Details</title>
	
	</head>
	<body>
<?php
	require_once "../../init.php";
	if(!isset($_GET['newsid'])){
		header("Location:$application_url");
	}
	$newsid = $_GET['newsid'];
	if($newsid=='ALL'){
			$news = $mysql->getResult("select * from news;");
	}
	else{
		$news = $mysql->getResult("select * from news where newsid = $newsid;");
	}
	if($news===false){
		echo "Error in database @ DisplayNews.php.".$mysql->getError();
		exit;
	}
	foreach($news as $story){
	echo '
		<p>
		<div class="heading"><h1>News</h1></div>
		<h2>'.$story['heading'].'</h2>
		<h4>Author :: '.$story['author'].'</h4>
		<p>Content :: <br />'.$story['content'].'</p>		
		</p>
	';
	}

?>
	<body>
</html>
