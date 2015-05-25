<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/25
 * Time: 上午10:38
 */
session_start();
//包含一个文件上传类中的上传类
include "class/fileupload.class.php";

$up = new fileupload;
//设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
$up -> set("path", "./upload/avatar/");
$up -> set("maxsize", 2000000);
$up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
$up -> set("israndname", false);


//使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
if($up -> upload("avatar")) {
//    echo '<pre>';
//    //获取上传后文件名子
//    var_dump($up->getFileName());
//    echo '</pre>';
    $url="upload/avatar/".$up->getFileName();
    require_once("class/saemysql.class.php");
    $mysql = new SaeMysql();
    $uid = $_SESSION['uid'];
    $sql = "update `users` set avatar ='".$url."' where uid ='".$uid."'";
    $result = $mysql->runSql($sql);
    if($result){
        echo "<script>alert('修改成功');window.location.href='admin/administrators/UserCenter/index.php';</script>";
    }else{
        echo "<script>alert('修改失败');window.location.href='admin/administrators/UserCenter/index.php';</script>";
    }

} else {
    echo '<pre>';
    //获取上传失败以后的错误提示
    var_dump($up->getErrorMsg());
    echo '</pre>';
}

