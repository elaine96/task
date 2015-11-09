<?php
	include 'link.php';
	$name = addslashes(trim($_POST['name']));
	$password = md5(addslashes(trim($_POST['password'])));
	$password1 = md5(addslashes(trim($_POST['password1'])));
	if($password!=$password1){
		echo "<script language=\"javascript\">";
		echo "alert(\"密码不一致\")";		
		echo "</script>";
		echo "<br>";
		echo "<a href=\"register.html\">返回注册页面</a>";
		exit();
	}
	alink('localhost','root','zyl19961020','elaine');
	$sql = "insert into user(name,password) values('$name','$password')";
	$result = mysql_query($sql);	
	if($result){
		echo "<script language=\"javascript\">";
		echo "alert(\"注册成功！\")";		
		echo "</script>";
		echo "<br>";
		echo "<script language=\"javascript\">";
		$_SESSION['name']=$name;
		echo "alert(\"欢迎 ".$_SESSION['name']."\")";		
		echo "</script>";
		echo "<br>";
		echo "<a href=\"login.html\">返回登录页面</a>";
	}else{
		echo "<script language=\"javascript\">";
		echo "alert(\"注册失败！\")";		
		echo "</script>";
		echo "<br>";
		echo "<a href=\"register.html\">返回注册页面</a>";
	}

?>