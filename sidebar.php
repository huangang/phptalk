<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午2:07
 */
require_once('class/saemysql.class.php');
$mysql = new SaeMysql();
?>
<!-- start of sidebar -->
<aside class="span4 page-sidebar">

    <section class="widget">
        <div class="support-widget">
            <h3 class="title">Support</h3>
            <p class="intro">Need more support? If you did not found an answer, contact us for further help.</p>
        </div>
    </section>

    <section class="widget">
        <div class="quick-links-widget">
            <h3 class="title">Quick Links</h3>
            <ul id="menu-quick-links" class="menu clearfix">
                <li><a href="index.php">Home</a></li>
                <li><a href="articles-list.php">Articles List</a></li>
            </ul>
        </div>
    </section>

    <section class="widget">
        <h3 class="title">Categories</h3>
        <div class="tagcloud">
            <?php
            $sql = "select *from sorts";
            $result = $mysql->getData($sql);
            $sort_num = count($result);
            for($i = 0 ;$i<$sort_num; $i++){
                $sid = $result[$i]['sid'];
                $sname = $result[$i]['sname'];
                echo '<a href="categories.php?sid='.$sid.'" class="btn btn-mini">'.$sname.'</a>';
            }
            ?>
        </div>
    </section>

</aside>
<!-- end of sidebar -->