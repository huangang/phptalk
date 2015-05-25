<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午10:25
 */
require_once('../class/saemysql.class.php');
$mysql = new SaeMysql();
if(isset($_GET)) {
    if ($_GET['table'] == 'post') {
        $pid = $_GET['pid'];
        $sql = "delete from posts WHERE pid =".$pid;
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('删除成功');window.location.href='../admin/administrators/Post/index.php';</script>";
        }else{
            echo "<script>alert('删除失败');window.location.href='../admin/administrators/Post/index.php';</script>";
        }
    }elseif($_GET['table'] == 'user'){
        $uid = $_GET['uid'];
        $sql1 = "delete from users WHERE uid=".$uid;
        $sql2 = "delete from posts where uid=".$uid;
        $sql3 = "delete from comments where uid=".$uid;
        $result1 = $mysql->runSql($sql1);
        $result2 = $mysql->runSql($sql2);
        $result3 = $mysql->runSql($sql3);
        if($result1){
            echo "<script>alert('删除成功');window.location.href='../admin/administrators/User/index.php';</script>";
        }else{
            echo "<script>alert('删除失败');window.location.href='../admin/administrators/User/index.php';</script>";
        }
    }elseif($_GET['table'] == 'sort'){
        $sid = $_GET['sid'];
        $sql3 = "select pid from posts WHERE sid=".$sid;
        $result3 = $mysql->getData($sql3);
        for ($i = 0; $i<count($result3); $i++){
            $pid = $result3[$i]['pid'];
            $sql4 = "delete from comments where pid =".$pid;
            $mysql->runSql($sql4);
        }
        $sql = "delete from sorts where sid =".$sid;
        $sql2 = "delete from posts where sid =".$sid;
        $result = $mysql->runSql($sql);
        $result2 = $mysql->runSql($sql2);
        if($result){
            echo "<script>alert('删除成功');window.location.href='../admin/administrators/Sort/index.php';</script>";
        }else{
            echo "<script>alert('删除失败');window.location.href='../admin/administrators/Sort/index.php';</script>";
        }

    }elseif($_GET['table'] == 'comment'){
        $cid = $_GET['cid'];
        $sql = "delete from comments where cid =".$cid;
        $result = $mysql->runSql($sql);
        if($result){
            echo "<script>alert('删除成功');window.location.href='../admin/administrators/Comment/index.php';</script>";
        }else{
            echo "<script>alert('删除失败');window.location.href='../admin/administrators/Comment/index.php';</script>";
        }
    }
}