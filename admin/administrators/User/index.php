<!DOCTYPE html>
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
<form class="form-inline definewidth m20" action="index.php" method="get">
    用户名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户id</th>
        <th>用户名</th>
        <th>用户邮箱</th>
        <th>用户身份</th>
        <th>注册时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php
    require_once("../../../class/saemysql.class.php");
    $mysql = new SaeMysql();
    $sql = 'select *from users';
    $result = $mysql->getData($sql);
    for($i = 0 ;$i<count($result,0);$i++){
        $uid = $result[$i]['uid'];
        $username = $result[$i]['username'];
        $email = $result[$i]['email'];
        $register_time = $result[$i]['register_time'];
        $role = $result[$i]['role'];
        echo "<tr>";
        echo "<td>".$uid."</td>";
        echo "<td>".$username."</td>";
        echo "<td>".$email."</td>";
        echo "<td>".$role."</td>";
        echo "<td>".$register_time."</td>";
        echo "<td><a href='edit.php?uid=".$uid."&username=".$username."&email=".$email."&role=".$role."'>编辑</a> <a href=\"changePassword.php?uid=".$uid."\">修改密码</a><a href='#' onclick='del(".$uid.")'> 删除</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<div class="inline pull-right page">
    <?php echo count($result,0); ?> 条记录
</div>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="add.php";
		 });


    });

    function del(id)
    {
        var xmlhttp;
        var status="";
        try{
            xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');
        } catch(e){
            try{
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            } catch(e){
                try{
                    xmlhttp=new XMLHttpRequest();
                }catch(e){}
            }
        }


        if(confirm("确定要删除吗？该用户的所有文章及内容都会删除"))
        {

            xmlhttp.open("GET","../../../action/delete.php?table=user&uid="+id,true);
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4)
                //xmlhttp.status==404 代表 没有发现该文件
                    if (xmlhttp.status==200) {
                        //alert(xmlhttp.status);
                        status = xmlhttp.responseText;
                        console.log(status);
                    }

            }
            xmlhttp.send(null);
            window.location.href="index.php";

        }




    }
</script>