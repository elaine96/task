<?php
	include 'link.php';
//调用session
	session_start();
	$name = addslashes(trim($_POST['name']));//获取表单中的name	
	$password = md5(addslashes(trim($_POST['password'])));
	//单引号 (')双引号 (")反斜杠 (\)NULL  添加反斜杠
	//trim去掉左右两边的空格
	alink('localhost','root','zyl19961020','elaine');
	//使用之前写好的函数连接数据库
	//echo $name."-".$password."-".$password1;

	$sql = "select * from user where name='$name' AND password='$password'";
	//查询用户的sql语句
	$row = mysql_query($sql);
	//执行sql语句
	$result = mysql_fetch_assoc($row);
	//获取查询的数据（数据表第一行）
	if($result){
		echo "<script language=\"javascript\">";
		echo "alert(\"登录成功！\")";
		echo "</script>";
		echo "<br>";
		$_SESSION['name']=$name;
		$_SESSION['password']=$password;
		echo "<script language=\"javascript\">";
		echo "alert(\"欢迎".$_SESSION['name']."\")";
		echo "</script>";
		echo "<br>";
		echo "<a href=\"login.html\">返回登录页面</a><br>";
		echo "<a href=\"register.html\">返回注册页面</a>";
	}else{
		echo "<script language=\"javascript\">";
		echo "alert(\"密码或用户名错误！！\")";
		echo "<a href=\"login.html\">返回登录页面</a>";
		echo "</script>";
	}
?>