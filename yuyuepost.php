<?php

    include_once './lib/fun.php';
    include("conn.php");
    session_start();

    //根据用户名查询用户
    $user=$_SESSION['user'];
    $result = mysqli_query($con,"select * from im_user where username='$user' ;");

    $row = mysqli_fetch_assoc($result);
    $truename = $row['truename'];
    $bingid = $row['bingid'];
    $sex = $row['sex'];

    $keshi = $_POST['radio'];

    $piaojuid=rand(1,99999999);
    $sql = "INSERT into `guahao`(`piaojuid`,`bingid`,`bingname`,`sex`,`keshi`,`xuhao`,`date`,`money`,`didian`,`statu1`,`statu2`) values('{$piaojuid}','{$bingid}','{$truename}','{$sex}','{$keshi}',3,'{$_POST['date']}',10,'一楼','未就诊','未缴费')";

    $obj = mysqli_query($con,$sql);
    if($obj)
    {
        msg(1,'预约成功','kehuindex.php');
    }
    else
    {
        msg(2,mysqli_errno());
    }
?>