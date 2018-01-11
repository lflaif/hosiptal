<?php
	/**
	 * 数据库连接初始化
	 * @param $host
	 * @param $username
	 * @param $password
	 * @param $dbName
	 * @return bool|resource
	 */
	$con = new mysqli('127.0.0.1:3307','root','','simplevote');
	if(mysqli_connect_errno()){
		echo "数据库连接失败";
		exit();
	}
	mysqli_query($con,'set names utf8');
?>