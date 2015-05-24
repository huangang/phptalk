<?php
session_start();
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午3:06
 */
?>
<html>
<head>
    <link rel="shortcut icon" href="images/favicon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>找回密码</title>
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
    <form class="form-signin" role="form" method="post" action="">
        <h2 class="form-signin-heading">找回密码</h2>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
            <input type="email" class="form-control" placeholder="邮箱" required autofocus name="email">
        </div>
        <div class="input-group">
            <div class="input-group-addon"><img src="captcha.php" onclick="javascript:this.src = 'captcha.php?time=' + Math.random();"  style="height: 60%;"></div>
            <input type="text" class="form-control" placeholder="验证码" required name="code">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">找回</button>
        <br>
        <a href="login.php">登陆</a>
        <a href="index.php">返回首页</a>
    </form>

</div>
<?php

if(isset($_POST)&& $_POST != null) {
    $code = strtolower($_POST['code']);
    if ($code == $_SESSION['authnum_session']) {
        $email = $_POST['email'];
        require_once("class/saemysql.class.php");
        $mysql = new SaeMysql();
        $sql = "select *from users where email= '$email'";
        $result = $mysql->getLine($sql);
        if($result!=null && $result != false){
            require("class/class.phpmailer.php");
            require_once("class/class.smtp.php");
            $mail = new PHPMailer();
            $address = $email;
            $mail->IsSMTP(); // set mailer to use SMTP
            $mail->Host = "smtp.mxhichina.com"; // specify main and backup server
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "phptalk@pupued.com"; // SMTP username
            $mail->Password = "2012810505HuanGang"; // SMTP password
            $mail->From = "phptalk@pupued.com";
            $mail->FromName = "phptalk";
            $mail->AddAddress("$address", "");
            $mail->Subject = "phptalk找回密码";
            $_SESSION['action'] = md5($result['uid'].$result['email'].time());
            $url='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"].'?action='.$_SESSION['action'].'&uid='.$result['uid'].'&email='.$result['email'];
            $mail->Body = "请点击重置密码,".$url;
            $mail->AltBody = "请点击重置密码,".$url;
            if(!$mail->Send())
            {
                echo "Message could not be sent. <p>";
                echo "Mailer Error: " . $mail->ErrorInfo;
                exit;
            }else{
                echo '<script>alert("发送成功,请点击链接重置密码");window.location.href="login.php";</script>';
            }


        }else{
            echo '<script>alert("此邮箱不存在");window.location.href="backpassword.php";</script>';
        }


    }else{
        echo '<script>alert("验证码错误");window.location.href="backpassword.php";</script>';
    }
}

if(isset($_GET['action']) && $_GET !== null){
    if($_GET['action']== $_SESSION['action']) {
        $uid = $_GET['uid'];
        $email = $_GET['email'];
        require_once("class/saemysql.class.php");
        $passwd = md5('123456');
        $mysql = new SaeMysql();
        $sql = "update users set password='$passwd' where uid='$uid' and email='$email'";
        if($mysql->runSql($sql)){
            echo '<script>alert("密码以及重置为123456,请及时登陆修改密码");window.location.href="login.php";</script>';
        }

    }else{
        echo '<script>alert("链接已失效,请重新找回");window.location.href="backpassword.php";</script>';
    }
    session_destroy();
}
?>
</body>
</html>
