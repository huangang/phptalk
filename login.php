<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午2:19
 */
?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>登陆</title>
</head>
<body>
<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading
    {
        margin-bottom: 10px;
    }
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .form-signin input[type="text"] {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .input-group{
        margin-bottom: 10px;
    }

</style>


<div class="container">
    <form class="form-signin" role="form" method="post" action="DoLogin">
        <h2 class="form-signin-heading">请登陆</h2>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
            <input type="email" class="form-control" placeholder="邮箱" required autofocus name="email">
        </div>

        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></div>
            <input type="password" class="form-control" placeholder="密码" required name="password">
        </div>

        <div class="input-group">
            <div class="input-group-addon"><img src="captcha.jsp" onclick="javascript:this.src = 'captcha.php?time=' + Math.random();"></div>
            <input type="text" class="form-control" placeholder="验证码" required name="code">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        <br>
        <a href="backpassword.php">忘记密码</a>
        <a href="register.php">注册</a>
        <a href="index.php">返回首页</a>
    </form>

</div>

</body>
</html>