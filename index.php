<?php
include("header.php");
require_once('class/saemysql.class.php');
$mysql = new SaeMysql();
?>

<?php
include("search_from.php");
?>
<title>Knowledge</title>
<!-- Start of Page Container -->
<div class="page-container">
    <div class="container">
        <div class="row">

            <!-- start of page content -->
            <div class="span8 page-content">

                <!-- Basic Home Page Template -->
                <div class="row separator">

                    <section class="span4 articles-list">
                        <h3>Latest Articles</h3>
                        <?php
                        $sql = "select *from posts  order by pid desc limit 0,6";
                        $result = $mysql->getData($sql);
                        for($i = 0 ;$i<count($result,0);$i++){
                            $pid = $result[$i]['pid'];
                            $title = $result[$i]['title'];
                            $post_time = $result[$i]['post_time'];
                            $sid = $result[$i]['sid'];
                            $sql = "select sname from sorts where sid=".$sid;
                            $sname = $mysql->getVar($sql);
                            $sql = "select count(*) from post_hot where pid=".$pid;
                            $post_hot = $mysql->getVar($sql);
                            echo "<ul class=\"articles\"><li class=\"article-entry standard\">";
                            echo '<h4><a href="single.php?pid='.$pid.'">'.$title.'</a></h4>';
                            echo '<span class="article-meta">'.$post_time.'in  <a href="categories.php?sid='.$sid.'" title="View all posts in '.$sname.';"> '.$sname.'</a></span>';
                            echo '<span class="like-count">'.$post_hot.'</span></li></ul>';
                        }
                        ?>
                    </section>


                    <section class="span4 articles-list">
                        <h3>Featured Articles</h3>
                        <ul class="articles">
                            <?php
                            $sql = "SELECT post_hot.pid AS pid ,count(post_hot.pid)  as flow ,posts.title as title , posts.post_time as post_time ,posts.sid as sid from post_hot, posts where posts.pid = post_hot.pid GROUP BY post_hot.pid  ORDER BY flow DESC limit 0,6";
                            $result = $mysql->getData($sql);
                            for($i = 0 ;$i<count($result,0);$i++){
                                $pid = $result[$i]['pid'];

                                $title = $result[$i]['title'];
                                $post_time = $result[$i]['post_time'];
                                $sid = $result[$i]['sid'];
                                $sql = "select sname from sorts where sid=".$sid;
                                $sname = $mysql->getVar($sql);
                                $sql = "select count(*) from post_hot where pid=".$pid;
                                $post_hot = $mysql->getVar($sql);
                                echo "<li class=\"article-entry standard\">";
                                echo '<h4><a href="single.php?pid='.$pid.'">'.$title.'</a></h4>';
                                echo '<span class="article-meta">'.$post_time.'in  <a href="categories.php?sid='.$sid.'" title="View all posts in '.$sname.';"> '.$sname.'</a></span>';
                                echo '<span class="like-count">'.$post_hot.'</span></li>';
                            }
                            ?>
                        </ul>
                    </section>

                </div>
            </div>
            <!-- end of page content -->
            <?php
            include("sidebar.php");
            ?>
        </div>
    </div>
</div>
<!-- End of Page Container -->

<?php
include("footer.php");
?>

