﻿<?php
    include("conn.php");
    //表单进行了提交处理
    if(!empty($_POST['username']))
    {
        include_once './lib/fun.php';
        //mysql_real_escape_string()进行过滤
        $username = trim($_POST['username']);//用户名
        $password = trim($_POST['password']);//密码
        $repassword = trim($_POST['repassword']);//重复密码
        $truename = trim($_POST['truename']);//真实姓名
        $idcard = trim($_POST['idcard']);//身份证号
        $sex = trim($_POST['sex']);//性别
        //判断用户名不能为空
        if(!$username)
        {
            msg(2, '用户名不能为空');
        }
        if(!$password)
        {
            msg(2, '密码不能为空');
        }
        if(!$repassword)
        {
            msg(2,'确认密码不能为空');
        }

        if($password !== $repassword)
        {
            msg('两次输入密码不一致,请重新输入');
        }
        //数据库连接
        if(!$con)
        {
            echo mysql_errno();
            exit;
        }
        //判断用户是否在数据表存在
        $sql = "SELECT COUNT(  `id` ) as total FROM  `im_user` WHERE  `username` =  '{$username}'";
        $obj = mysqli_query($con,$sql);
        $result = mysqli_fetch_assoc($obj);
        //验证用户名是否存在
        if(isset($result['total']) && $result['total'] > 0)
        {
            msg(2,'用户名已存在,请重新输入');
        }
        //密码加密处理
        $password = createPassword($password);
        unset($obj, $result, $sql);
        $bingid=rand(1,99999999);
        //插入数据
        $sql = "INSERT `im_user`(`username`,`password`,`truename`,`sex`,`idcard`,`user_time`,`bingid`,`type`,`create_time`) values('{$username}','{$password}','{$truename}','{$sex}','{$idcard}','101010','{$bingid}',1,'{$_SERVER['REQUEST_TIME']}')";
        $obj = mysqli_query($con,$sql);
        if($obj)
        {
            msg(1,'注册成功','login.php');
        }
        else
        {
            msg(2,mysqli_errno());
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>H-OSPITAL|用户注册</title>
        <link type="text/css" rel="stylesheet" href="./static/css/common.css">
        <link type="text/css" rel="stylesheet" href="./static/css/add.css">
        <link rel="stylesheet" type="text/css" href="./static/css/login.css">
    </head>
    <body>
        <div class="header">
            <div class="logo f1">
                <img src="./static/image/logo1.png">
            </div>
            <div class="auth fr">
                <ul>
                    <li><a href="login.php">登录</a></li>
                    <li><a href="register.php">注册</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="center">
                <div class="center-login">
                    <div class="login-banner">
                        <a href="#"><img src="./static/image/welcome_login.png" alt=""></a>
                    </div>
                    <div class="user-login">
                        <div class="user-box">
                            <div class="user-title">
                                <p>用户注册</p>
                            </div>
                            <form class="login-table" name="register" id="register-form" action="register.php" method="post">
                                <div class="login-left">
                                    <label class="username">用户名</label>
                                    <input type="text" class="yhmiput" name="username" placeholder="Username" id="username">
                                </div>
                                <div class="login-right">
                                    <label class="username">真实姓名</label>
                                    <input type="text" class="yhmiput" name="truename" placeholder="Username" id="truename">
                                </div>
                                <div class="login-right">
                                    <label class="username">身份证号</label>
                                    <input type="text" class="yhmiput" name="idcard" placeholder="Username" id="idcard">
                                </div>
                                <div class="login-right">
                                    <label class="username">性别</label>
                                    <input type="text" class="yhmiput" name="sex" placeholder="sex" id="sex">
                                </div>
                                <div class="login-right">
                                    <label class="passwd">密码</label>
                                    <input type="password" class="yhmiput" name="password" placeholder="Password" id="password">
                                </div>
                                <div class="login-right">
                                    <label class="passwd">确认</label>
                                    <input type="password" class="yhmiput" name="repassword" placeholder="Repassword"
                                        id="repassword">
                                </div>
                                <div class="login-btn">
                                    <button type="submit">注册</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p><span>H-OSPITAL</span>©2017 POWERED BY SHUDONG</p>
        </div>
    </body>
   
    <script src="./static/js/jquery-1.10.2.min.js"></script>
    <script src="./static/js/layer/layer.js"></script>
    <script>
        $(function () {
            $('#register-form').submit(function () {
                var username = $('#username').val(),
                    password = $('#password').val(),
                    repassword = $('#repassword').val();
                if (username == '' || username.length <= 0) {
                    layer.tips('用户名不能为空', '#username', {time: 2000, tips: 2});
                    $('#username').focus();
                    return false;
                }
                if (password == '' || password.length <= 0) {
                    layer.tips('密码不能为空', '#password', {time: 2000, tips: 2});
                    $('#password').focus();
                    return false;
                }
                if (repassword == '' || repassword.length <= 0 || (password != repassword)) {
                    layer.tips('两次密码输入不一致', '#repassword', {time: 2000, tips: 2});
                    $('#repassword').focus();
                    return false;
                }
                return true;
            })
        })
    </script>
</html>