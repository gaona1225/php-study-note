<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>phpOop</title>
</head>


<body>
	<h5>类的声明</h5>
	<?php
		//声明Person类
		class Person{  
			private $name;  //声明一个公有权限的属性$name
			private $age; //声明一个私有权限的属性$age
			private $sex; //声明一个静态权限的属性$sex

			//构造方法,为成员属性设置初始值
			function __construct($name="helen",$age=22,$sex="woman"){
				$this->name = $name ;
				$this->age = $age;
				$this->sex = $sex;
			}

			function __clone(){
				$this->name = $this->name."-clone";
			}

			/**
				声明魔术方法需要两个参数，直接为私有属性附值时自动调用，并可以屏蔽一些非法附值
				@param string $propertyName 成员属性名
				@param mixed  $propertyValue 成员属性值
			*/
			function __set($propertyName,$propertyValue){
				//如果第一个参数是属性名sex则条件成立
				if($propertyName == "sex"){
					//第二个参数只能是woman或是man
					if(!($propertyValue == "woman" || $propertyValue == "man")){
						return ;
					}
				}
				if($propertyName == "age"){
					if($propertyValue<0 || $propertyValue>150){
						return ;
					}
				}
				$this->$propertyName = $propertyValue ; //$propertyName是一个变量
			}

			/**
				在类中添加__get()方法，只I就获取属性值时自动调用一次，以属性名作为参数传入并处理。
				@param string $propertyName 成员属性名
				@return mixed 返回属性值
			*/
			public function __get($propertyName){
				if($propertyName == "sex"){
					return "保密";
				}else if($propertyName == "age"){
					if($this->age>30){
						return $this->age = 20;
					}else{
						return $this->$propertyName ;
					}
				}else{
					return $this->$propertyName ;
				}
			}

			function say(){
				echo "父类：".$this->name."在说，我的今年：".$this->age."岁,是：".$this->sex."<br/>";
			}

			function eat($food){
				echo $this->name."在吃".$food."<br/>";
			}
			private function run(){ //私有成员方法 外部实例化的对象无权访问,类里的方法可以调用
				echo $this->name."在跑步<br/>";
			}

			//析构方法，在对象失去引用时调用
			function __destruct(){
				//echo $this->name."马上要被销毁<br/>" ;
			}
		}

		//声明一个学生类，使用extends关键字扩展（继承）Person类
		class Students extends Person{
			var $school ;
			function study(){
				echo $this->name."正在".$this->school."学习<br/>";
			}
		}

		class Teacher extends Person{
			var $wage;
			function __construct($name="helen",$age=22,$sex="woman",$wage=5000){
				parent::__construct($name,$age,$sex);//调用父类中被本方法覆盖的构造中方法，为从父类中继承够了的属性附初值
				$this->wage = $wage;
			}
			function teaching(){
				echo $this->name."正在上课,工资是:".$this->wage."<br/>";
			}
			//重写从Person继承的say()
			function say(){
				parent::say(); //调用父类中被本方法覆盖掉的方法。
				echo $this->name."在说，我今年：".$this->age."岁,是：".$this->sex."是一名老师，工资是：".$this->wage."<br/>";
			}
		}

		//通过Person类实例化对象
		$gaona = new Person ;
		$gaona->name = "gaona" ;  //name、age、sex是一个属性名
		$gaona->age = 28;
		$gaona->sex = "woman";
		echo $gaona->name."<br/>" ;
		$gaona->say();
		$gaonaClone = clone $gaona;
		//$gaonaClone->name = "gaonaClone";
		$gaonaClone->say();

		$doudou = new Person('doudou',2,'woman');
		echo $doudou->age."<br/>" ;
		echo $doudou->sex."<br/>";

		$MrZhang = new Teacher();
		$MrZhang->name = "zhangmou";
		$MrZhang->wage = 3000;
		$MrZhang->teaching();
		$MrZhang->say();

		$maomao = new Students('maomao');
		$maomao->school = "15中";
		$maomao->study();
	?>
	<h5>常见的关键字和魔术方法</h5>
	<?php
	//定制MyClass为final，所以MySonClass欲继承MyClass所以报错
	//errorMsg:Fatal error: Class MySonClass may not inherit from final class (MyClass)...
	/*final class MyClass{ 

	}
	class MySonClass extends MyClass{

	}*/
	/*class MyClass{ 
		//定制sleep为final，所以MySonClass欲重写sleep所以报错
		//errorMsg:Fatal error:  Cannot override final method MyClass::sleep()...
		final function sleep(){
			echo "parent is sleeping<br/>";
		}
	}
	class MySonClass extends MyClass{
		function sleep(){
			echo "son is sleeping<br/>";
		}
	}
	$son = new MySonClass;
	$son->sleep();*/

	class MyClass{ 
		static $count; //在类中声明一个静态成员属性$count,用来统计对象被创建的次数。
		const CONSTSTR='const value' ;
		function __construct(){
			self::$count++;
		}
		static function getCount(){
			return self::$count;
		}
		function showConst(){
			return self::CONSTSTR;
		}
	}
	MyClass::$count = 0;
	$myclass1 = new MyClass;
	$myclass2 = new MyClass;
	$myclass3 = new MyClass;

	echo "父：".MyClass::getCount()."<br/>";
	echo "子：".$myclass3->getCount()."<br/>";
	echo "父常量：".MyClass::showConst()."<br/>";

	?>
	<h6>"魔术"方法</h6>
	<?php
		class TestClass{
			private $foo;
			private $address;
			function __construct($foo,$address){
				$this->foo = $foo;
				$this->address = $address;
			}
			function __toString(){
				return $this->foo." ".$this->address."<br/>";
			}
			function printHello(){
				echo "Hello fn<br/>";
			}
			/**
				声明魔术方法__call()，用来处理调用对象中不存在的方法
				@param string $functionName 访问不存在的成员方法名称字符串
				@param array  $args 访问不存在的成员方法中传递的参数数组
			*/
			function __call($functionName,$args){
				echo "你所调用的函数：".$functionName."(参数：";
				print_r($args);
				echo ")不存在！<br/>";
			}
		}
		$test = new TestClass('hellworld','beijing');
		echo $test;
		$test->myFun("one",2);
		$test->printHello();
	?>
</body>
</html>

