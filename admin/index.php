<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午3:27
 */
session_start();
if($_SESSION['role'] == 'manager'){
    echo '<script>window.location.href="administrators/index.php";</script>';
}elseif($_SESSION['role'] == 'ordinary'){
    echo '<script>window.location.href="ordinary/index.php";</script>';
}else{
    echo '<script>alert("身份出错");window.location.href="/index.php";</script>';
}