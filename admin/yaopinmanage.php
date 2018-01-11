<?php
	include("common.php");
	include("../conn.php");
	error_reporting(E_ALL & ~E_NOTICE);

	if($_GET['do'] == "delete"){
		$id = $_GET['id'];
		$result = $con->query("delete from medicine where yaoid in ($id);");
		if($result){
			echo "<script>onload = function(){document.getElementById('errortext').innerHTML='删除成功';}</script>";
		}else{
			echo "<script>onload = function(){document.getElementById('errortext').innerHTML='删除失败';}</script>";
		}
	}

	if($_POST['Submit']){
		$id = $_POST['id'];
		$yaoname = $_POST['yaoname'];
		$leibie = $_POST['leibie'];
		$count = $_POST['count'];
		$money = $_POST['money'];
		$guoqitime = $_POST['guoqitime'];
		$shengchantime = $_POST['shengchantime'];
		$statu1 = $_POST['statu1'];
		$statu2 = $_POST['statu2'];
		$result = $con->query("update medicine set yaoname='$yaoname',leibie='$leibie',count='$count',money='$money',guoqitime='$guoqitime',shengchantime='$shengchantime',statu1='$statu1',statu2='$statu2' where yaoid='$id';");
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
						<td>药品编号</td>
						<td>药品名称</td>
						<td>药品类别</td>
						<td>数量</td>
						<td>金额</td>
						<td>过期日期</td>
						<td>生产日期</td>
						<td>状态1</td>
						<td>状态2</td>
						<td>修改</td>
						<td>删除</td>
					</tr>
					<?php 
							//echo iconv("GB2312","UTF-8",'中文');
							$result = mysqli_query($con,"select * from medicine;");
							while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td width="200" valign="middle"><input style="width:15px;" name="checkboxitem" type="checkbox" value="<?php echo $row['yaoid']; ?>"><?php echo $row['yaoid']; ?></td>
						<td width="200"><?php echo $row['yaoname']; ?></td>
						<td width="200"><?php echo $row['leibie']; ?></td>
						<td width="200"><?php echo $row['count']; ?></td>
						<td width="200"><?php echo $row['money']; ?></td>
						<td width="200"><?php echo $row['guoqitime']; ?></td>
						<td width="200"><?php echo $row['shengchantime']; ?></td>
						<td width="200"><?php echo $row['statu1']; ?></td>
						<td width="200"><?php echo $row['statu2']; ?></td>
						<td width="*"><input style="width:40px; height:22px;" value="修改" type="button" onClick="location.href='?do=change&id=<?php echo $row['yaoid']; ?>'"></td>
						<td width="34"><input style="width:40px; height:22px;" value="删除" type="button" onClick="location.href='?do=delete&id=<?php echo $row['yaoid']; ?>'"></td>
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
					$result = mysqli_query($con,"select * from medicine where yaoid='$id';");
					$row = mysqli_fetch_assoc($result)
			?>
				<br/>
				<div class="div_from_aoto" style="width: 800px;">
					<form action="" method="post">
						<input name="id" type="hidden" value="<?php echo $id; ?>">
						<p>
							<label>药品名称：
								<input name="yaoname" type="text"  value="<?php echo $row['yaoname']; ?>">
							</label>
						</p>
						<p>
							<label>药品类别：
								<input name="leibie" type="text"  value="<?php echo $row['leibie']; ?>">
							</label>
						</p>  
						<p>
							<label>药品数量：	
								<input name="count" type="text"  value="<?php echo $row['count']; ?>">
							</label>
						</p>
						<p>
							<label>药品价格：
								<input name="money" type="text"  value="<?php echo $row['money']; ?>">
							</label>
						</p>
						<p>
							<label>过期日期：
								<input name="guoqitime" type="text"  value="<?php echo $row['guoqitime']; ?>">
							</label>
						</p>
						<p>
							<label>生产日期：
								<input name="shengchantime" type="text"  value="<?php echo $row['shengchantime']; ?>">
							</label>
						</p>
						<p>
							<label>入库状态：
								<input name="statu1" type="text"  value="<?php echo $row['statu1']; ?>">
							</label>
						</p>
						<p>
							<label>消除状态：
								<input name="statu2" type="text"  value="<?php echo $row['statu2']; ?>">
							</label>
						</p>
						<p>
							<label>
								<input type="submit" name="Submit" value="修改">
							</label>
						</p>
					</form>
				</div>
			<?php } ?>
		</div>
	</body>
</html>