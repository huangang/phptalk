<?php
session_start();
?>
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
<form action="../../../updateavatar.php" method="post" class="definewidth m20" enctype="multipart/form-data" >
  <table class="table table-bordered table-hover definewidth m10">
      <?php
      require_once("../../../class/saemysql.class.php");
      $mysql = new SaeMysql();
      $uid = $_SESSION['uid'];
      $sql = "select avatar from users where uid = '".$uid."'";
      $avatar = $mysql->getVar($sql);
      $url='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"]."/".$avatar;
      ?>
    <tr>
      <td class="tableleft">头像</td>
      <td>
        <img src="<?php echo $url; ?>" width="70" height="70"><br>
        <input type="file" name="avatar" value="<?php echo $avatar; ?>" accept="image/jpg" />
      </td>
    </tr>
      <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <tr>
      <td class="tableleft"></td>
      <td>
        <button type="submit" class="btn btn-primary" type="button" value="upload" >保存</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-success" name="backid" id="backid">返回</button>
      </td>
    </tr>
    <tr>
      <td class="tableleft"></td>
      <td>备注：上传的jpg图片（显示扩展名为.jpg）大小不能超过4M！</td>
    </tr>
  </table>
</form>
</body>
</html>
<script>
  $(function () {
    $('#backid').click(function(){
      window.location.href="index.php";
    });

  });
</script>

