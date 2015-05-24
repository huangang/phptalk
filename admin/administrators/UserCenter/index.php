<html>
<head>
  <title></title>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../../jJs/bootstrap.js"></script>
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
<%
  SqlOperate sqlop = new SqlOperate();
  String uid = session.getAttribute("uid").toString();
  String sql = "select *from users where uid = '"+uid+"'";
  List list = sqlop.excuteQuery(sql, null);
  Object ob = list.get(0);
  Map<String, Object> map = new HashMap<String, Object>();
  map = (HashMap)ob;
  String username=map.get("username").toString();
  String email=map.get("email").toString();
  String role=map.get("role").toString();
  String register_time=map.get("register_time").toString();
  String avatar=map.get("avatar").toString();
  String path = request.getContextPath();
  String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>
<form class="form-inline definewidth m20" action="/DoUpdate" method="post" >
<table class="table table-bordered table-hover definewidth m10" >
  <input type="hidden" name="table" value="usercenter" />
  <tr>
    <td class="tableleft">用户名</td>
    <td><input type="text" name="username" value="<%=username%>"/></td>
  </tr>
  <tr>
    <td class="tableleft">邮箱</td>
    <td><input type="text" name="email" value="<%=email%>"/></td>
  </tr>
  <tr>
    <td class="tableleft">身份</td>
    <td><input type="text" name="role" value="<%=role%>" disabled="true" /></td>
  </tr>
  <tr>
    <td class="tableleft">注册时间</td>
    <td><input type="text" name="register_time" value="<%=register_time.substring(0,register_time.length()-2)%>" disabled="true"/></td>
  </tr>
  <tr>
    <td class="tableleft">头像</td>
    <td>
      <img src="<%=basePath+avatar%>" width="70" height="70"><br>
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
