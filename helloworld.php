<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>php</title>
</head>


<body>
	<?php
		echo "hello world"."<br/>" ;
		$name = 'zhangsan' ;
		echo $name."<br/>" ;
		$_bTrue = true ;
		$_nNum = 8 ;
		switch($_nNum){
			case 1 : echo '我是111'; break;
			case 8 : echo '我是888'; break;
		}
		echo "<br/>";
		var_dump($_bTrue);
		switch($_bTrue){
			case true : echo '我是true'; break;
			case false : echo '我是false'; break;
		}
	?>
</body>
</html>

