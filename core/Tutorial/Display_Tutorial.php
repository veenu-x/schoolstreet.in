<?php
	require_once "../../init.php";
	if(!isset($_GET['tutid'])){
		header("Location:$application_url");
	}
	$tutid = $_GET['tutid'];
	if($tutid=='ALL'){
			$tutorials = $mysql->getResult("select * from tutorials order by tuttime desc;");
	}
	else{
		$tutorials = $mysql->getResult("select * from tutorials where tutid = $tutid;");
	}
	if($tutorials===false){
		echo "Error in database @ Display_Tutorial.php.".$mysql->getError();
		exit;
	}
	echo '<p class="large center bold">Tutorial(s)</div><hr />';
	foreach($tutorials as $story){
		if($story['webpublishing']==0){
				$content = '<a href = "Download.php?tutid='.$story['tutid'].'">Download File</a>';
			}
			else $content = $story['content'];
	echo '
		<p>
		<p class="center large">'.$story['heading'].'</p>
		<p class="italic bold">Author :: '.$story['author'].'</p>
		<p>Link :: <br />'.$story['link'].'</p>
		<p>Content :: <br />'.$content.'</p>		
		</p><hr />
	';
	}

?>
	</body>
</html>
