<?php
/**
*	连接数据库的函数
*/

function alink($host,$user,$password,$db){
	$links = mysql_connect($host,$user,$password);
	//三个参数分别是，数据库地址，数据库用户名，数据库密码
	mysql_query('set names utf8');//设置数据库编码
	if(!$links){
		//mysql_error()数据库连接的错误信息
		die("连接数据库失败".mysql_error()."<br>");
	}else{
		//echo "连接数据成功！<br>";
		echo "<script language=\"javascript\">";
		echo "alert(\"连接数据库成功！！\")";
		
		echo "</script>";
	}//判断数据库是否连接成功
	$r = mysql_select_db($db,$links);//选择数据库
	return $r;
}
?>