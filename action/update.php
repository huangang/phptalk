<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午10:25
 */

require_once('../class/saemysql.class.php');
$mysql = new SaeMysql();
if(isset($_POST)){
    if($_POST['table'] == 'post'){
        $title = $_POST['title'];
        $pid = $_POST['pid'];
        $sid = $_POST['sid'];
        $content = $_POST['content'];
        $sql = "update `posts` set `title` ='".$title."',`sid` ='".$sid."',`content` ='".$content."' where `pid` ='".$pid."'";
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('修改成功');window.location.href='../admin/administrators/Post/index.php';</script>";
        }else{
            echo "<script>alert('修改失败');window.location.href='../admin/administrators/Post/index.php';</script>";
        }

    }
    elseif($_POST['table']=='user'){
        $uid = $_POST['uid'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $sql = "update `users` set username ='".$username."', role='".$role."', email='".$email."' where uid ='".$uid."'";
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('修改成功');window.location.href='../admin/administrators/User/index.php';</script>";
        }else{
            echo "<script>alert('修改失败');window.location.href='../admin/administrators/User/index.php';</script>";
        }
    }elseif($_POST['table']=='manageChangePassword'){
        $uid = $_POST['uid'];
        $password = md5($_POST['nowPassword']);
        $sql = "update `users` set password='".$password."' where uid='".$uid."'";
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('密码修改成功');window.location.href='../admin/administrators/User/index.php';</script>";
        }else{
            echo "<script>alert('密码修改失败');window.location.href='../admin/administrators/User/index.php';</script>";
        }
    }
}