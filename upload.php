<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文件上传</title>
</head>


<body>
	<h5>文件上传</h5>
	<?php
		$allowtype = array("gif","png","jpg");
		$size=1000000;
		$path="./uploads";

		if($_FILES["myfile"]["error"]>0){
			echo "上传错误<br/>";
			switch($_FILES["myfile"]["error"]){
				case 1:die("上传文件超出了php配置文件中的约定值：upload_max_filesize");break;
				case 2:die("上传文件大小超出了表单中的约定值：MAX_FILE_SIZE");break;
				case 3:die("文件只被部分上传");break;
				case 4:die("没有上传任何文件");break;
				default:die("未知错误");
			}
		}

		$hz=array_pop(explode(".",$_FILES["myfile"]["name"]));
		if(!in_array($hz,$allowtype)){
			die("这个后缀是<b>$hz</b>,不是允许上传的文件类型");
		}
		if($_FILES["myfile"]["size"]>$size){
			die("上传文件太大");
		}
		$filename=date("YmdHis").rand(100,999).".".$hz;
		if(is_uploaded_file($_FILES["myfile"]["tmp_name"])){
			if(!move_uploaded_file($_FILES["myfile"]["tmp_name"],$path."/".$filename)){
				die("不能将文件移动到指定目录");
			}
		}else{
			die("上传了非法文件".$_FILES["myfile"]["name"]);
		}
		echo "文件{$upfile}上传成功，保存在目录{$path}中，大小为{$_FILES["myfile"]["size"]}"
	?>
	
</body>
</html>

