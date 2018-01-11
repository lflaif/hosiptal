<?php
//表单进行了提交处理
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location:../../login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>H-OSPITAL|用户信息</title>
        <link type="text/css" rel="stylesheet" href="./static/css/common.css">
        <link type="text/css" rel="stylesheet" href="./static/css/add.css">
        <link rel="stylesheet" type="text/css" href="./static/css/login.css">
    </head>
    <body>
        <div class="header">
            <div class="logo f1">
                <img src="./static/image/logo1.png">
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
                                <p>用户信息</p>
                            </div>
                            <form class="login-table" name="register" id="register-form" action="register.php" method="post">
                            <?php
                                include("conn.php");
                                $user = $_SESSION['user'];
                                mysqli_query($con,'set names utf8');
                                $result = mysqli_query($con,"select * from im_user where username ='$user';");
                                $row = mysqli_fetch_assoc($result)?>
                                <div class="login-left">
                                    <label class="username">用户账号</label>
                                    <input type="text" class="yhmiput" name="username" value="<?php echo $row['username']; ?>" id="username">
                                </div>
                                <div class="login-left">
                                    <label class="username">真实姓名</label>
                                    <input type="text" class="yhmiput" name="truename" value="<?php echo $row['truename']; ?>" id="truename">
                                </div>
                                <div class="login-left">
                                    <label class="username">身份证号</label>
                                    <input type="text" class="yhmiput" name="idcard" value="<?php echo $row['idcard']; ?>" id="idcard">
                                </div>
                                <div class="login-btn">
                                    <button type="submit">确认</button>
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
</html>