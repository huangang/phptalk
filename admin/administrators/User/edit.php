<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/ckform.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form action="../../../action/update.php" method="post" class="definewidth m20">
    <table class="table table-bordered table-hover definewidth m10">
        <input type="hidden" name="table" value="user" />
        <?php
        $uid = $_GET['uid'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $role = $_GET['role'];
        ?>
        <input type="hidden" name="uid" value="<?php echo $uid; ?>" />
        <tr>
            <td width="10%" class="tableleft">用户名</td>
            <td><input type="text" name="username" value="<?php echo $username; ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="text" name="email" value="<?php echo $email; ?>"/></td>
        </tr>
        <td class="tableleft">身份</td>
        <td>
            <select name="role">
                <?php
                if ($role == 'manager') {
                    ?>
                    <option value="manager" selected="selected">manager</option>
                    <option value="ordinary">ordinary</option>
                <?php
                }elseif($role == 'ordinary') {
                    ?>
                    <option value="manager">manager</option>
                    <option value="ordinary" selected="selected">ordinary</option>
                <?php
                }
                ?>
            </select>
        </td>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;
                <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="{:U('User/index')}";
		 });

    });
</script>