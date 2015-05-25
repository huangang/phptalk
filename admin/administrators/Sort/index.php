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
    机构名称：
    <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增分类</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>分类编号</th>
        <th>分类名</th>
        <th>文章数</th>
        <th>管理操作</th>
    </tr>
    </thead>
    <?php
    require_once("../../../class/saemysql.class.php");
    $mysql = new SaeMysql();
    $sql = 'select *from sorts';
    $result = $mysql->getData($sql);
    for($i = 0 ;$i<count($result,0);$i++){
        $sid = $result[$i]['sid'];
        $sname = $result[$i]['sname'];
        $sql = "select count(*) from posts where sid=".$sid;
        $postNum = $mysql->getVar($sql);
        echo "<tr>";
        echo "<td>".$sid."</td>";
        echo "<td>".$sname."</td>";
        echo "<td>".$postNum."</td>";
        echo "<td><a href='edit.php?sid=".$sid."&sname=".$sname."'>编辑</a> <a href='#' onclick='del(".$sid.")'>删除</a></td>";
        echo "</tr>";
    }

    ?>
</table>
<div class="inline pull-right page">
    <?php echo count($result); ?> 条记录
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
		
		
		if(confirm("确定要删除吗？该分类下所有文章都会删除"))
		{

            xmlhttp.open("GET","../../../action/delete.php?table=sort&sid="+id,true);
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4)
                //xmlhttp.status==404 代表 没有发现该文件
                    if (xmlhttp.status==200)
                    {
                        //alert(xmlhttp.status);
                        status=xmlhttp.responseText;
                        console.log(status);
                    } else
                    {
                        alert("发生错误："+xmlhttp.status);
                    }

            }
            xmlhttp.send(null);
            window.location.href="index.php";
		
		}
	
	
	
	
	}
</script>