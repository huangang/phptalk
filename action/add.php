<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午10:25
 */
session_start();
require_once('../class/saemysql.class.php');
$mysql = new SaeMysql();
if(isset($_POST)) {
    if ($_POST['table'] == 'post') {
        $title = $_POST['title'];
        $sid = $_POST['sid'];
        $content = $_POST['content'];
        $uid = $_SESSION['uid'];
        $sql = "insert into posts(title,uid,sid,content) values('".$title."','".$uid."','".$sid."','".$content."')";
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('增加成功');window.location.href='../admin/administrators/Post/index.php';</script>";
        }else{
            echo "<script>alert('增加失败');window.location.href='../admin/administrators/Post/index.php';</script>";
        }
    }elseif($_POST['table'] == 'user'){
        $email = $_POST['email'];
        $sql = "select email from users where email ='".$email."'";
        if($mysql->getVar($sql)){
            echo "<script>alert('该邮箱已存在');window.location.href='../admin/administrators/User/add.php';</script>";
        }else {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $role = $_POST['role'];
            $sql = "insert into users(username,email,password,role) VALUES ('" . $username . "','" . $email . "','" . $password . "','" . $role . "')";
            $result = $mysql->runSql($sql);
            if ($result) {
                echo "<script>alert('增加成功');window.location.href='../admin/administrators/User/index.php';</script>";
            } else {
                echo "<script>alert('增加失败');window.location.href='../admin/administrators/User/index.php';</script>";
            }
        }
    }
}