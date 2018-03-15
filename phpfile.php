<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>phpFile</title>
</head>


<body>
	<h5>文件系统处理</h5>
	<?php
		echo filetype("c:\\windows")."<br/>";
		echo is_dir("c:\\windows")."<br/>";

		/**
			声明一个函数，通过传入一个文件名称获取文件大部分属性
			@param   string $fileName  文件名称
		*/
		function getFilePro($fileName){
			//如果提供的文件或目录不存在，则直接退出函数
			if(!file_exists($fileName)){
				echo "目标文件不存在！！<br/>";
				return ;
			}

			//判断是否是一个普通文件，如果是则条件成立
			if(is_file($fileName)){
				echo $fileName."是一个文件<br/>";
			}
			if(is_dir($fileName)){
				echo $fileName."是一个目录<br/>";
			}
			echo "文件形态：".filetype($fileName)."<br/>";
			echo "文件大小：".filesize($fileName)."<br/>";

			//调用自定义getFileType()/getFileSize()方法
			echo "文件形态：".getFileType($fileName)."<br/>";
			echo "文件大小：".getFileSize(filesize($fileName))."<br/>";

			if(is_readable($fileName)){
				echo $fileName."是可读文件<br/>";
			}
			if(is_writable($fileName)){
				echo $fileName."是可写文件<br/>";
			}
			if(is_executable($fileName)){
				echo $fileName."是可执行文件<br/>";
			}
			echo "文件建立时间：".date("Y年m月j日".filectime($fileName))."<br/>";
			echo "文件最后修改时间：".date("Y年m月j日".filemtime($fileName))."<br/>";
			echo "文件最后打开时间：".date("Y年m月j日".fileatime($fileName))."<br/>";
		}

		/**
			声明一个函数，通过传入一个文件名称获取文件类型属性
			@param   string $fileName  文件名称
		*/
		function getFileType($fileName){
			switch(filetype($fileName)){
				case "file": $type="普通文件";break;
				case "dir": $type="目录文件";break;
				case "block": $type="块设备文件";break;
				case "char": $type="字符设备文件";break;
				case "fifo": $type="命名管道文件";break;
				case "link": $type="符号链接";break;
				case "unknown": $type="未知类型";break;
				default: $type="没有检测到类型";
			}
			return $type;
		}
		/**
			声明一个函数，文件大小单位转换函数
			@param   int $bytes  文件大小的字节数
			@return  string   转换后带有单位的尺寸字符串
		*/
		function getFileSize($bytes){
			if($bytes>=pow(2,40)){
				$return = round($bytes/pow(1024,4),2);
				$suffix="TB";
			}elseif($bytes>=pow(2,30)){
				$return = round($bytes/pow(1024,3),2);
				$suffix="GB";
			}elseif($bytes>=pow(2,20)){
				$return = round($bytes/pow(1024,2),2);
				$suffix="MB";
			}elseif($bytes>=pow(2,10)){
				$return = round($bytes/pow(1024,1),2);
				$suffix="KB";
			}else{
				$return = $bytes;
				$suffix="Byte";
			}
			return $return."".$suffix."<br/>";
		}
		getFilePro("D:\study\php\helloworld.php");

		$filePro = stat("D:\study\php\helloworld.php");
		print_r(array_slice($filePro,13));
		echo "<br/>";
	?>
	<h5>目录基本操作</h5>
	<?php
		$path = "D:\study\php\helloworld.php";
		echo basename($path)."<br/>";
		echo basename($path,".php")."<br/>";
		echo dirname($path)."<br/>";

		$path_parts = pathinfo($path);
		echo $path_parts["dirname"]."<br/>";
		echo $path_parts["basename"]."<br/>";
		echo $path_parts["extension"]."<br/>";

		$num=0;
		$dirname="demo";
		$dir_handle=opendir($dirname);	
		echo "<table border='0' align='center' width='600' cellspacing='0' cellpadding='0'>";
		echo "<caption><h2>目录".$dirname."下面的内容</h2></caption>";
		echo "<tr align='left' bgcolor='#cccccc'>";
		echo "<th>文件名</th><th>文件大小</th><th>文件类型</th><th>修改时间</th>";
		while($file=readdir($dir_handle)){
			$dirFile = $dirname."/".$file;
			$bgcolor = $num++%2===0? "#ffffff" : "#cccccc";
			echo "<tr bgcolor='".$bgcolor."'>";
			echo "<td>".$file."</td>";
			echo "<td>".filesize($dirFile)."</td>";
			echo "<td>".filetype($dirFile)."</td>";
			echo "<td>".date("Y/m/t",filemtime($dirFile))."</td>";
			echo "</tr>";
		}
		echo "</table>";
		closedir($dir_handle);
		echo "在<b>".$dirname."</b>目录下的子目录和文件共有<b>".$num."</b>个";
	?>
	<h5>文件的基本操作</h5>
	<?php
		$fileName = "data.txt";
		$handle=fopen($fileName,"w") or die("打开<b>".$fileName."</b>失败！");
		echo fread($handle, 10);
		for($row=0;$row<10;$row++){
			fwrite($handle,$row.":我是写入的信息\n");
		}
		fclose($handle);
	?>

	
</body>
</html>

