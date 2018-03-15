<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文件上传</title>
</head>


<body>
	<h5>文件上传</h5>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		选择文件：<input type="file" name="myfile" />
		<input type="submit" value="文件上传" />
	</form>

	<?php
		$filename="test.png";
		/*header("Content-Type:image/png");
		header("Content-Disposition:attachment;filename='".$filename."'");
		header("Content-Length:".filesize($filename));
		readfile($filename);*/
	?>
</body>
</html>

