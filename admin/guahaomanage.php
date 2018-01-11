<?php
	include("common.php");
	include("../conn.php");
	error_reporting(E_ALL & ~E_NOTICE);

	if($_GET['do'] == "delete"){
		$id = $_GET['id'];
		$result = $con->query("delete from guahao where piaojuid in ($id);");
		if($result){
			echo "<script>onload = function(){document.getElementById('errortext').innerHTML='删除成功';}</script>";
		}else{
			echo "<script>onload = function(){document.getElementById('errortext').innerHTML='删除失败';}</script>";
		}
	}
	if($_POST['Submit']){
		$id = $_POST['id'];
		$bingid = $_POST['bingid'];
		$bingname = $_POST['bingname'];
		$keshi = $_POST['keshi'];
		$xuhao = $_POST['xuhao'];
		$money = $_POST['money'];
		$didian = $_POST['didian'];
		$statu1 = $_POST['statu1'];
		$statu2 = $_POST['statu2'];
		$result = $con->query("update guahao set bingid='$bingid', bingname='$bingname', keshi='$keshi', xuhao='$xuhao', money='$money', didian='$didian' where guahaoid='$id';");
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
		<script language="javascript">
			function selectall()
			{
				var node = document.getElementsByName("checkboxitem");
				for(var i=0; i<node.length;i++){
					node[i].checked=true;
				}
			}
			function unselectall(){
				var node = document.getElementsByName("checkboxitem");
				for(var i=0; i<node.length;i++){
					node[i].checked = false;
				}
			}
			function deleteselect(){
				var node = document.getElementsByName("checkboxitem");
				id = "";
				for(var i=0; i<node.length;i++){
					if(node[i].checked){
						if(id == ""){
							id = node[i].value;
						}else{
							id = id+", "+node[i].value;
						}
					}
				}
				if(id == ""){
					alert("请选择删除项");
				}else{
					location.href="?do=delete&id="+id;
				}
			}
		</script>
	</head>
	<body>
		<div class="div_from_aoto" style="width: 800px; margin:30px 40px;">
			<div id="result111" class="result111" style="width:300px; height:20px; margin:4px auto; color:#33FF99;  ">
				<h5 id="errortext"></h5>
			</div>
			<form name="form1" method="post" action="">
				<table width="1000" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>票据号</td>
						<td>挂号编号</td>
						<td>客户姓名</td>
						<td>科室</td>
						<td>序号</td>
						<td>金额</td>
						<td>地点</td>
						<td>状态1</td>
						<td>状态2</td>
						<td>修改</td>
						<td>删除</td>
						<td>打印</td>
						<td>支付</td>
					</tr>
					<?php 
						$result = mysqli_query($con,"select * from guahao;");
						while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td width="200" valign="middle">
							<input style="width:15px;" name="checkboxitem" type="checkbox" value="<?php echo $row['piaojuid']; ?>">
								<?php echo $row['piaojuid']; ?>
						</td>
						<td width="200"><?php echo $row['guahaoid']; ?></td>
						<td width="200"><?php echo $row['bingname']; ?></td>
						<td width="200"><?php echo $row['keshi']; ?></td>
						<td width="200"><?php echo $row['xuhao']; ?></td>
						<td width="200"><?php echo $row['money']; ?></td>
						<td width="200"><?php echo $row['didian']; ?></td>
						<td width="200"><?php echo $row['statu1']; ?></td>
						<td width="200"><?php echo $row['statu2']; ?></td>
						<td width="*">
							<input style="width:60px; height:22px;" value="修改" type="button" onClick="location.href='?do=change&id=<?php echo $row['guahaoid']; ?>'">
						</td>
						<td width="34">
							<input style="width:60px; height:22px;" value="删除" type="button" onClick="location.href='?do=delete&id=<?php echo $row['guahaoid']; ?>'">
						</td>
						<td width="34">
							<a href="code/code.php?id=<?php echo $row['guahaoid'];?>">
								<input style="width:60px; height:22px;" value="打印" type="button">
							</a>
						</td>
						<td width="34">
							<a href="code/code.php?id=<?php echo $row['guahaoid'];?>">
								<input style="width:60px; height:22px;" value="支付" type="button">
							</a>
						</td>
					</tr>
					<?php }?>
					<tr>
						<td colspan="4">
							<input value="选择全部" type="button" onClick="selectall()" />
							<input value="取消全选" type="button" onClick="unselectall()" />
							<input value="删除所选" type="button" onClick="deleteselect()" />
						</td>
					</tr>
				</table>
			</form>
			<?php
				if($_GET['do'] == "change"){
					$id = $_GET['id'];
					$result = mysqli_query($con,"select * from guahao where guahaoid='$id';");
					$row = mysqli_fetch_assoc($result);
			?>
			<br/>
				<div class="div_from_aoto" style="width: 800px;">
				<form action="" method="post">
					<label>
						票据号:<input name="id" type="text" value="<?php echo $row['piaojuid']; ?>" readOnly="true">
					</label>
					<br>
					<label>
						挂号编号:<input name="id" type="text" value="<?php echo $row['guahaoid']; ?>" readOnly="true">
					</label>
					<br>
					<label>
						病人编号:<input name="bingid" type="text"  value="<?php echo $row['bingid']; ?>">
					</label>
					<br>
					<label>
						客户姓名:<input name="bingname" type="text"  value="<?php echo $row['bingname']; ?>">
					</label>
					<br>
					<label>
						科室:<input name="keshi" type="text"  value="<?php echo $row['keshi']; ?>">
					</label>
					<br>
					<label>
						序号:<input name="xuhao" type="text"  value="<?php echo $row['xuhao']; ?>">
					</label>
					<br>
					<label>
						金额:<input name="money" type="text"  value="<?php echo $row['money']; ?>">
					</label>
					<br>
					<label>
						地点:<input name="didian" type="text"  value="<?php echo $row['didian']; ?>">
					</label>
					<br>
					<label>
						状态1:<input name="statu1" type="text"  value="<?php echo $row['statu1']; ?>" readOnly="true">
					</label>
					<br>
					<label>
						状态2:<input name="statu2" type="text"  value="<?php echo $row['statu2']; ?>" readOnly="true">
					</label>
					<br>
					<label>
						<input type="submit" name="Submit" value="修改">
					</label>
				</form>
				</div>
			<?php } ?>
		</div>
	</body>
</html>