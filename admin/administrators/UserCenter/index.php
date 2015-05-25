<?php
session_start();
?>
<html>
<head>
  <title></title>
  <meta charset="UTF-8">
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
<?php
require_once("../../../class/saemysql.class.php");
$mysql = new SaeMysql();
$uid = $_SESSION['uid'];
$sql = "select *from users where uid = '".$uid."'";
$result = $mysql->getLine($sql);
$username = $result["username"];
$email = $result["email"];
$role = $result["role"];
$register_time = $result["register_time"];
$avatar = $result["avatar"];
$url='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"]."/".$avatar;
?>
<form class="form-inline definewidth m20" action="/DoUpdate" method="post" >
<table class="table table-bordered table-hover definewidth m10" >
  <input type="hidden" name="table" value="usercenter" />
  <tr>
    <td class="tableleft">用户名</td>
    <td><input type="text" name="username" value="<?php echo $username; ?>"/></td>
  </tr>
  <tr>
    <td class="tableleft">邮箱</td>
    <td><input type="text" name="email" value="<?php echo $email; ?>"/></td>
  </tr>
  <tr>
    <td class="tableleft">身份</td>
    <td><input type="text" name="role" value="<?php echo $role; ?>" disabled="true" /></td>
  </tr>
  <tr>
    <td class="tableleft">注册时间</td>
    <td><input type="text" name="register_time" value="<?php echo $register_time; ?>" disabled="true"/></td>
  </tr>
  <tr>
    <td class="tableleft">头像</td>
    <td>
      <img src="<?php echo $url; ?>" width="70" height="70"><br>
    </td>
  </tr>
  <tr>
    <td class="tableleft"></td>
    <td><button type="submit" class="btn btn-primary">保存</button></td>
  </tr>
</table>

</form>
<div class="inline pull-right page">
</div>
</body>
</html>
