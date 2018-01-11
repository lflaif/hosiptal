<?php
	include("common.php");
	include("../conn.php");
	//error_reporting(E_ALL & ~E_NOTICE);

	if($_POST['Submit']){
        $piaojuid = rand(1,99999999);
        //$guahaoid = $_POST['guahaoid'];
		$bingid = $_POST['bingid'];
        $bingname = $_POST['bingname'];
        $sex = $_POST['sex'];
        $keshi = $_POST['keshi'];
        $date = $_POST['date'];
		$xuhao = $_POST['xuhao'];
		$money = $_POST['money'];
		$didian = $_POST['didian'];
		$result = $con->query("insert into guahao (piaojuid, bingid, bingname, sex, keshi, date, xuhao, money, didian, statu1, statu2) values ('$piaojuid', '$bingid', '$bingname', '$sex', '$keshi','$date', '$xuhao', '$money', '$didian', '未就诊', '未缴费');");
		if($result){
			echo "<script>onload = function(){document.getElementById('errortext').innerHTML='修改成功';}</script>";
		}else{
			echo "<script>onload = function(){document.getElementById('errortext').innerHTML='修改失败';}</script>";
		}
	}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
	</head>
	<body>
		<div class="div_from_aoto" style="width: 800px; margin:30px 40px;">
			<div id="result111" class="result111" style="width:300px; height:20px; margin:4px auto; color:#33FF99;  ">
				<h5 id="errortext"></h5>
			</div>
			<br/>
				<div class="div_from_aoto" style="width: 800px;">
                    <form action="" method="post">
                        <label>
                            病人编号:<input name="bingid" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            客户姓名:<input name="bingname" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            客户性别:<input name="sex" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            科室:<input name="keshi" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            日期:<input name="date" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            序号:<input name="xuhao" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            金额:<input name="money" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            地点:<input name="didian" type="text"  value="">
                        </label>
                        <br>
                        <label>
                            <input type="submit" name="Submit" value="修改">
                        </label>
                    </form>
				</div>
		</div>
	</body>
</html>
