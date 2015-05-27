<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/25
 * Time: 下午10:48
 */
require_once('class/saemysql.class.php');
$mysql = new SaeMysql();
$search = $_GET['s'];
?>
<?php include("header.php"); ?>

<?php
include("search_from.php");
?>

<!-- Start of Page Container -->
<script src="js/Cutter.js"></script>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="span8 main-listing">
                <!-- start of page content -->
                <?php
                $sql = "SELECT * FROM posts WHERE title LIKE '%".$search."%'";
                $result = $mysql->getData($sql);
                for($i = 0 ;$i<count($result,0);$i++){
                    $pid = $result[$i]['pid'];
                    $title = $result[$i]['title'];
                    $post_time = $result[$i]['post_time'];
                    $content = $result[$i]['content'];
                    $sid = $result[$i]['sid'];
                    $sql = "select sname from sorts where sid=".$sid;
                    $sname = $mysql->getVar($sql);
                    $sql = "select count(*) from post_hot where pid=".$pid;
                    $post_hot = $mysql->getVar($sql);
                    $sql = "select count(*) from comments where pid=".$pid;
                    $comment_num = $mysql->getVar($sql);
                    echo '
                    <article class="format-standard type-post hentry clearfix">
                    <header class="clearfix"><h3 class="post-title">
                    <a href="single.php?pid='.$pid.'">';
                    echo $title.'</a></h3>
                    <div class="post-meta clearfix">
                    <span class="date">';
                    echo $post_time.'</span>
                    <span class="category"><a href="#" title="'.$sname.'">'.$sname.'</a></span>
                    <span class="comments"><a href="#" title="Comment on '.$title.'">'.$comment_num.' Comments</a></span>
                    <span class="like-count">'.$post_hot.'</span>
                    </div>';
                    echo ' </header>
                    <div id="pid'.$pid.'">'.$content.'</div>';
                    echo "<script>var oElement".$pid." = document.getElementById(\"pid".$pid."\");Cutter.run(oElement".$pid.", oElement".$pid.", 20,{more:\"<a href=single.php?pid=".$pid.">Read more</a>\"}, {more:\"more\"});</script>";
                    echo '</article>';

                }
                ?>


                <!--                <div id="pagination">-->
                <!--                    <a href="#" class="btn active">1</a>-->
                <!--                    <a href="#" class="btn">2</a>-->
                <!--                    <a href="#" class="btn">3</a>-->
                <!--                    <a href="#" class="btn">Next »</a>-->
                <!--                    <a href="#" class="btn">Last »</a>-->
                <!--                </div>-->

            </div>
            <!-- end of page content -->


            <?php include("sidebar.php"); ?>

        </div>
    </div>
</div>
<!-- End of Page Container -->

<?php include("footer.php"); ?>