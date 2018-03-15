<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>phpStr</title>
</head>


<body>
	<h5>类的声明</h5>
	<?php
		echo "This 
			  is 
			  Helen<br/>";

		$url = "http://www.brophp.net";
		fopen($url,"r") or die("Unable to connect to $url");

		$str="LAMP";
		$number=789;
		printf("%s book.page number %u<br/>",$str,$number);
		printf("%0.3f<br/>",$number);
		$format="The %2\$s book contains %1\$d pages.That's a nice %2\$s full of %1\$d pages.<br/>";
		printf($format,$number,$str);

		$num = 12345;
		$txt = sprintf("%0.2f",$num);
		echo $txt;
	?>
	
</body>
</html>

