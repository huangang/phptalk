<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/27
 * Time: 下午5:28
 */
require_once('class/saemysql.class.php');
$mysql = new SaeMysql();
$search = $_GET['s'];
$sql = "SELECT * FROM posts WHERE title LIKE '%".$search."%'";
$result = $mysql->getData($sql);
for($i = 0 ;$i<count($result,0);$i++){
    $pid = $result[$i]['pid'];
    $title = $result[$i]['title'];
    echo '<article class="format-standard type-post hentry clearfix" style="background: #f5f5f5"><h3 class="post-title"><a href="single.php?pid='.$pid.'">';
    echo $title.'</a></h3>';
    echo '</article>';

}

