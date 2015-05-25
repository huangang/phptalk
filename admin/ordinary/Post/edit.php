<?php
session_start();
$uid = $_SESSION['uid'];
$title = $_GET['title'];
$pid = $_GET['pid'];
$sid = $_GET['sid'];
?>
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
<form action="../../../action/update.php"  method="post" class="definewidth m20">
<input type="hidden" name="table" value="post" />
    <input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
<table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">标题</td>
        <td><input type="text" name="title" value="<?php echo $title; ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">分类</td>
        <td>
            <select name="sid">
                <?php

                require_once("../../../class/saemysql.class.php");
                $mysql = new SaeMysql();
                $sql = 'select * from sorts';
                $all_sort = $mysql->getData($sql);
                for($i = 0; $i < count($all_sort); $i++){
                    if($all_sort[$i]['sid'] == $sid){
                        echo "<option value=".$sid." selected='true'>" ;
                        echo $all_sort[$i]['sname'];
                        echo "</option>";
                        }else{
                        echo "<option value=".$all_sort[$i]['sid'].">";
                        echo $all_sort[$i]['sname'];
                        echo "</option>";
                        }
                }

                $sql = 'select content from posts WHERE pid='.$pid;
                $content = $mysql->getVar($sql);


                ?>
            </select>
        </td>
    </tr>
    <tr>
        <script type="text/javascript" charset="utf-8" src="../../../ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="../../../ueditor/ueditor.all.min.js"> </script>
        <script type="text/javascript" charset="utf-8" src="../../../ueditor/lang/zh-cn/zh-cn.js"></script>
        <td class="tableleft">正文</td>
        <td>
<!--            <textarea name="content" rows="10" cols="20">-->
<!--            </textarea>-->
                <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="content" ><?php echo $content;?></script>
                <script type="text/javascript">
                    var ue = UE.getEditor('editor');
                </script>
        </td
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
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