<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>php</title>
</head>


<body>
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
		function table($tableName,$rows,$cols){
			$str_table = "" ;
			$str_table.= "<table align='center' border='1' width='600'>" ;
			$str_table.= "<caption><h1>".$tableName."</h1></caption>" ;

			for($out=0;$out<$rows;$out++){
				$bgcolor = $out%2 == 0 ? "#ffffff" : "#dddddd" ; //设置隔行换色
				$str_table.= "<tr bgcolor=".$bgcolor.">";
				for($in=0;$in<$cols;$in++){
					$str_table.= "<td>".($out*$rows+$in)."</td>";
				}
				$str_table.= "</tr>";
			}
			$str_table.= "</table>";
			return $str_table ;
		}
		$str = table('表格B',5,3);
		echo table('表格A',6,9);
		echo $str;


		$one = 200;
		$two = 100;
		function demo(){
			//global $one,$two ; //声明全局变量，使用global关键字加载全局变量。

			//echo "运算结果：".($one + $two)."<br/>";   //相当于在函数内部新声明并且没有附初始值的两个变量

			$GLOBALS['two'] = $GLOBALS['one'] + $GLOBALS['two'] ;
		}
		demo();  
		echo $two ; //输出300


		function test(&$arg){
			$arg = 200 ;
			echo "我是函数内部调用：".$arg ;
		}
		$var = 100 ;
		test($var);
		echo "我是函数外部调用：".$var ;
	?>
</body>
</html>

