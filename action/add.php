<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午10:25
 */
session_start();
$role = $_SESSION['role'];
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
            if($role == "manager") {
                echo "<script>alert('增加成功');window.location.href='../admin/administrators/Post/index.php';</script>";
            }elseif($role == "ordinary") {
                echo "<script>alert('增加成功');window.location.href='../admin/ordinary/Post/index.php';</script>";
            }
        }else{
            if($role == "manager") {
                echo "<script>alert('增加失败');window.location.href='../admin/administrators/Post/index.php';</script>";
            }elseif($role == "ordinary") {
                echo "<script>alert('增加失败');window.location.href='../admin/ordinary/Post/index.php';</script>";
            }
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
    }elseif($_POST['table'] == 'sort'){
        $sname = $_POST['sortname'];
        $sql = "insert into sorts(sname) VALUES ('".$sname."')";
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('增加成功');window.location.href='../admin/administrators/Sort/index.php';</script>";
        }else{
            echo "<script>alert('增加失败');window.location.href='../admin/administrators/Sort/index.php';</script>";
        }

    }elseif($_POST['table'] == 'comment'){
        $uid = $_SESSION['uid'];
        $pid = $_POST['pid'];
        $content = $_POST['comment'];
        $sql = "insert into comments(uid,pid,content) values('".$uid."','".$pid."','".$content."')";
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('评论成功');window.location.href='../single.php?pid=".$pid."';</script>";
        }else{
            echo "<script>alert('评论失败');window.location.href='../single.php?pid=".$pid."';</script>";
        }

    }elseif($_POST['table'] == 'post_hot'){
        $uid = $_SESSION['uid'];
        $pid = $_POST['pid'];
        $sql = "select uid *from post_hot where pid=".$pid;
        $user_id = $mysql->getVar($sql);
        if($uid == $user_id){
            echo "<script>alert('您已经赞过');window.location.href='../single.php?pid=".$pid."';</script>";
        }else{
            $sql = "insert into post_hot(pid,uid) values ('".$pid."','".$uid."')";
            $result = $mysql->runSql($sql);
            if($result){
                echo "<script>alert('点赞成功');window.location.href='../single.php?pid=".$pid."';</script>";
            }else{
                echo "<script>alert('点赞失败');window.location.href='../single.php?pid=".$pid."';</script>";
            }
        }
    }
}