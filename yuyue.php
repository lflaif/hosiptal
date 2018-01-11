<?php
    include_once './lib/fun.php';
    include("conn.php");
    session_start();
    if(!isset($_SESSION['user'])){
        //header('Location:../../login.php');
        exit();
    }
    //根据用户名查询用户
    $user=$_SESSION['user'];
    $result = mysqli_query($con,"select * from im_user where username='$user' ;");
    $row = mysqli_fetch_assoc($result);
    $truename = $row['truename'];
    if(!empty($_POST['submit'])){
        $keshi = $_POST['radio'];

        for($i=0;$i<10;$i++){
            $rand .= mt_rand(0,9);
        }
        $result = $con->query("INSERT `guahao`(`piaojuid`,`bingid`,`bingname`,`keshi`,`xuhao`,`date`,`money`,`didan`) values('{$rand}','{$rand}','{$truename}','{$keshi}','{$_GET['date']}',10,4,'一楼'，'未就诊'，'未缴费')");
        if($result){
            echo "<script>onload = function(){document.getElementById('errortext').innerHTML='预约成功';}</script>";
        }else{
            echo "<script>onload = function(){document.getElementById('errortext').innerHTML='预约失败';}</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>H-OSPITAL|用户登录</title>
        <link type="text/css" rel="stylesheet" href="./static/css/common.css">
        <link type="text/css" rel="stylesheet" href="./static/css/add.css">
        <link rel="stylesheet" type="text/css" href="./static/css/login.css">
        <link type="text/css" rel="stylesheet" href="./static/css/jquery-labelauty.css">
        <style>
            ul {
                list-style-type: none;
            }
            li {
                display: inline-block;
            }
            li {
                margin: 10px 0;
            }
            input.labelauty + label {
                font: 12px "Microsoft Yahei";
            }
        </style>
    </head>

    <body>
        <div class="header">
            <div class="logo f1">
                <img src="./static/image/logo1.png">
            </div>
            <div class="auth fr">
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
                                <p>网上预约</p>
                            </div>
                            <form class="login-table" name="login" id="login-form" action="yuyuepost.php" method="post">
                                <div class="login-right">
                                    <ul class="dowebok">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><input type="radio" name="radio" value="呼吸科" data-labelauty="呼吸科"id="0"></li>
                                    <li><input type="radio" name="radio" value="骨伤科" data-labelauty="骨伤科" id="1"></li>
                                    <li><input type="radio" name="radio" value="皮肤科" data-labelauty="皮肤科" id="2"></li>
                                    <li><input type="radio" name="radio" value="内科" data-labelauty="内科" id="3"></li>
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><input type="radio" name="radio" value="口腔科" data-labelauty="口腔科" id="4"></li>
                                    <li><input type="radio" name="radio" value="五官科" data-labelauty="五官科" id="5"></li>
                                    <li><input type="radio" name="radio" value="神经科" data-labelauty="神经科" id="6"></li>
                                    <li><input type="radio" name="radio" value="外科" data-labelauty="外科" id="7"></li>
                                    </ul>
                                </div>
                                <div class="login-right">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="date" id='date'>
                                </div>
                                <div class="login-btn">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit">预约</button>
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
    <script src="./static/js/jquery-labelauty.js"></script>
    <script>
        $(function(){
        $(':input').labelauty();
    });
    </script>
</html>