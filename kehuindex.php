<?php
    include_once './lib/fun.php';
    if($login = checkLogin())
    {
        $user = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>H-OSPITAL|首页</title>
        <link rel="stylesheet" type="text/css" href="./static/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="./static/css/index.css"/>
    </head>
    <body>
        <div class="header">
            <div class="logo f1">
                <img src="./static/image/logo1.png">
            </div>
            <div class="auth fr">
                <ul>
                    <?php if($login): ?>
                        <li><span>用户：<?php echo $_SESSION['user'] ?></span></li>
                        <li><a href="login_out.php">退出</a></li>
                    <?php else: ?>
                        <li><a href="login.php">登录</a></li>
                        <li><a href="register.php">注册</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="banner">
                <img class="banner-img" src="./static/image/welcome2.png" width="732px" height="372" alt="图片描述">
            </div>
            <div class="img-content">
                <ul>
                    <li>
                        <a href="yuyue.php"><img class="img-li-fix" src="./static/image/yuyue.png" width="358px" height="200px"/>
                    </li>
                    <li>
                        <a href="information.php"><img class="img-li-fix" src="./static/image/bingren.png" width="358px" height="200px"/>
                    </li>
                    <li>
                        <img class="img-li-fix" src="./static/image/chufang.png" width="358px" height="200px">
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <p><span>H-OSPITAL</span>©2017 POWERED BY SHUDONG</p>
        </div>
    </body>
    <script src="./static/js/jquery-1.10.2.min.js"></script>
</html>