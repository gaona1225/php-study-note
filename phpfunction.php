<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>php</title>
</head>


<body>
	<a href="phparray.php?age=28&sex=woman">跳转</a>
	<h5>get方式</h5>
	<form action="phparray.php" method="get">
		get用户名：<input type="text" name="username1" value="" />
		get密码：<input type="password" name="password1" value="" />
		<input type="submit" value="submit" />
	</form>
	<h5>post方式</h5>
	<form action="phparray.php" method="post">
		post用户名：<input type="text" name="username2" value="" />
		post密码：<input type="password" name="password2" value="" />
		<input type="file" />
		<input type="submit" value="submit" />
	</form>
	<?php
		/**
			自定义函数table()时，声明三个参数，参数之间使用逗号分隔
			@param string $tableName 需要一个字符串类型的表名
			@param int    $rows      需要一个整形数值设置表格的行数
			@param int    $cols      需要一个整形数值设置表格的列数

			制定的表格字符串
			@return String 返回表格代码字符串
		*/
		/*将使用双层for循环输出表格的代码声明为函数，函数名为table*/
		table('表格A',3,5);
		function table($tableName,$rows,$cols){
			echo "<table align='center' border='1' width='600'>";
			echo "<caption><h1>".$tableName."</h1></caption>";

			for($out=0;$out<$rows;$out++){
				$bgcolor = $out%2 == 0 ? "#ffffff" : "#dddddd" ; //设置隔行换色
				echo "<tr bgcolor=".$bgcolor.">";
				for($in=0;$in<$cols;$in++){
					echo "<td>".($out*$rows+$in)."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
		table('表格B',5,3);
	?>

	<h3>php的函数应用</h3>
	<?php
		function person($name="张三",$age=20,$sex="男"){
			echo "我的名字是：".$name."，我的年龄是：".$age.",性别是：".$sex."</br>";
		}
		person();
		person('李四');
		person('李四',30);
		person('李四',30,"女");

		function more_args(){
			$args = func_get_args();
			for($i=0;$i<count($args);$i++){
				echo "我是第".$i."个参数：".$args[$i]."<br/>";
			}
		}
		more_args('a','b',3);

		$num = 100 ;
		echo strrev($num);
	?>

	<?php
		/*require('***.php');
		$condition = true ;
		if($condition){
			include('***1.php');
		}else{
			include('***2.php');
		}*/
	?>
</body>
</html>

