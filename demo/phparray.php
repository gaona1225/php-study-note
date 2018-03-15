<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>phpArray</title>
</head>


<body>
	<h5>直接附值方式声明数组</h5>
	<?php
		$ary1[0] = 'a' ;
		$ary1[1] = 1 ;
		$ary1[2] = 'what' ;
		for($i=0; $i<count($ary1);$i++){
			echo '我是数组的第'.$i.'个值：'.$ary1[$i].'<br/>' ;
		} 
		var_dump($ary1);
	?>
	<h5>声明关联数组</h5>
	<?php
		$ary2['name'] = 'zhangsan' ;
		$ary2['age'] = 28 ;
		$ary2['sex'] = 'man' ;
		echo '名字：'.$ary2['name'].'<br/>' ;
		echo '年龄：'.$ary2['age'].'<br/>' ;
		echo '性别：'.$ary2['sex'].'<br/>' ;
		print_r($ary2);
		echo '<br/>';
		foreach($ary2 as $value){
			echo '我是数组值：'.$value.'<br/>' ;
		}
		foreach($ary2 as $key=>$value){
			echo '我是数组'.$key.',值：'.$value.'<br/>' ;
		}
	?>
	<h5>预定义数组</h5>
	<h6>$_SERVER</h6>
	<?php
		foreach($_SERVER as $key=>$value){
			echo "键：".$key.",值：".$value;
		}
	?>
	<h6>$_ENV</h6>
	<?php
		foreach($_ENV as $key=>$value){
			echo "键：".$key.",值：".$value;
		}
	?>
	<h6>$_GET</h6>
	<?php
		foreach($_GET as $key=>$value){
			echo "键：".$key.",值：".$value;
		}
	?>
	<h6>$_POST</h6>
	<?php
		foreach($_POST as $key=>$value){
			echo "键：".$key.",值：".$value;
		}
	?>
	<h6>$_REQUEST</h6>
	<?php
		foreach($_REQUEST as $key=>$value){
			echo "键：".$key.",值：".$value;
		}
	?>
	<h6>$_FILES</h6>
	<?php
		foreach($_FILES as $key=>$value){
			echo "键：".$key.",值：".$value;
		}
	?>
</body>
</html>

