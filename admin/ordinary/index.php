<?php
session_start();
if($_SESSION['uid'] == null && $_SESSION['role'] !== 'ordinary'){
    echo '<script>window.location.href="/index.php";</script>';
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>普通用户</title>
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/main-min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header">

    <div class="dl-title">
    </div>

    <div class="dl-log"><a href="../../index.php">返回前台</a>&nbsp;&nbsp;欢迎您，<span class="dl-log-user"><?php echo $_SESSION['username']; ?></span><a href="../../exit.php" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">个人中心</div></li>
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bui-min.js"></script>
<script type="text/javascript" src="../assets/js/common/main-min.js"></script>
<script type="text/javascript" src="../assets/js/config-min.js"></script>
<script>
    BUI.use('common/main',function(){
        var config = [
            {id:'1',menu:[{text:'系统管理',items:[
                {id:'11',text:'帖子管理',href:'Post/index.php'},
                {id:'14',text:'评论管理',href:'Comment/index.php'}]}]},
            {id:'2',homePage : '21',menu:[{text:'个人中心',items:[{id:'21',text:'个人设置',href:'UserCenter/index.php'},{id:'22',text:'修改密码',href:'UserCenter/ChangePassword.php'},{id:'23',text:'修改头像',href:'UserCenter/ChangeAvatar.php'}]}]}

        ];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
</body>
</html>