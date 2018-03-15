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
			public $name;  //声明一个公有权限的属性$name
			private $age; //声明一个私有权限的属性$age
			static $sex; //声明一个静态权限的属性$sex
			var $other; //不需要特定意义的修饰用var

			//构造方法,为成员属性设置初始值
			function __construct($name="helen",$age=22,$sex="woman"){
				$this->name = $name ;
				$this->age = $age;
				$this->sex = $sex;
			}

			function say(){
				echo $this->name."在说，我的今年：".$this->age."岁,是：".$this->sex."<br/>";
			}

			function eat($food){
				echo $this->name."在吃".$food."<br/>";
			}
			private function run(){ //私有成员方法 外部实例化的对象无权访问,类里的方法可以调用
				echo $this->name."在跑步<br/>";
			}

			function callRun(Person $other){ //callRun方法可以调用类中定义的私有方法run。将实例化对象$gaona的name附值给$other的name传入run方法中。
				$other->name = $this->name;
				$other->run();
			}

			//析构方法，在对象失去引用时调用
			function __destruct(){
				echo $this->name."我马上要被销毁<br/>" ;
			}
		}

		//通过Person类实例化对象
		$gaona = new Person ;
		$gaona->name = 'gaona';
		//$gaona->age=28;  //age是Person的私有方法无法重新设置
		$gaona->say();
		$gaona->eat('meat');
		//$gaona->run();  //因为run是Person的私有方法无法访问
		$gaona->callRun(new Person('other'));

		$doudou = new Person("doudou",2,"girl");
		$doudou->say();
	?>
	
</body>
</html>

