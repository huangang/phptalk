<?php
include("header.php");
require_once('class/saemysql.class.php');
$mysql = new SaeMysql();
$pid = $_GET['pid'];
?>

<?php
include("search_from.php");
?>

<!-- Start of Page Container -->
<div class="page-container">
    <div class="container">
        <div class="row">

            <!-- start of page content -->
            <div class="span8 page-content">

                <ul class="breadcrumb">
                    <li><a href="index.php">Knowledge Home</a><span class="divider">/</span></li>
                    <?php
                    $sql = "select sname from sorts JOIN posts ON pid =".$pid;
                    $sname = $mysql->getVar($sql);
                    $sql = "select sid from posts where pid =".$pid;
                    $sid = $mysql->getVar($sql);
                    ?>
                    <li><a href="categories.php?sid=<?php echo $sid; ?>" title="<?php echo $sname; ?>"><?php echo $sname; ?></a> <span class="divider">/</span></li>
                    <?php
                    $sql = "select title from posts WHERE  pid =".$pid;
                    $title = $mysql->getVar($sql);
                    ?>
                    <li class="active"><?php echo $title; ?></li>
                </ul>

                <article class=" type-post format-standard hentry clearfix">

                    <h1 class="post-title"><a href="#"><?php echo $title; ?></a></h1>

                    <div class="post-meta clearfix">
                        <?php
                        $sql = "select post_time from posts WHERE pid=".$pid;
                        $post_time = $mysql->getVar($sql);
                        ?>
                        <span class="date"><?php echo $post_time; ?></span>
                        <span class="category"><a href="categories.php?sid=<?php echo $sid; ?>" title="<?php echo $sname; ?>"><?php echo $sname; ?></a></span>
                        <?php
                        $sql = "select count(*) from comments where pid=".$pid;
                        $comment_num = $mysql->getVar($sql);
                        ?>
                        <span class="comments"><a href="#comments" title="Comment on <?php echo $title; ?>"><?php echo $comment_num; ?> Comments</a></span>
                        <?php
                        $sql = "select count(*) from post_hot WHERE pid=".$pid;
                        $like_count = $mysql->getVar($sql);
                        ?>
                        <span class="like-count"><?php echo $like_count; ?></span>
                    </div><!-- end of post meta -->
                    <?php
                    $sql = "select *from posts where pid=".$pid;
                    $result = $mysql->getLine($sql);
                    $content = $result['content'];
                    echo $content;
                    ?>

                </article>

                <div class="like-btn">

                    <form id="like-it-form" method="post" onclick="addLike()">

                        <span class="like-it "><?php echo $like_count; ?></span>
                        <input type="hidden" name="post_id" value="<?php echo $pid; ?>" id="post_id">
                        <input type="hidden" name="action" value="like_it" >
                    </form>
                    <script>
                        function addLike() {
                            var id = eval(document.getElementById('post_id')).value;
                            var xmlhttp;
                            var status = "";
                            try {
                                xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
                            } catch (e) {
                                try {
                                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                                } catch (e) {
                                    try {
                                        xmlhttp = new XMLHttpRequest();
                                    } catch (e) {
                                    }
                                }
                            }
                            if(true)
                            {
                                xmlhttp.open("POST", "action/add.php?table=post_hot&pid=" + id, true);
                                xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                                var postStr = 'table=post_hot&pid=' + id;
                                xmlhttp.onreadystatechange=function(){
                                    if (xmlhttp.readyState==4)
                                    //xmlhttp.status==404 代表 没有发现该文件
                                        if (xmlhttp.status==200)
                                        {
                                            status=xmlhttp.responseText;
                                            console.log(status);
                                        } else
                                        {
                                            alert("发生错误："+xmlhttp.status);
                                        }

                                }
                                xmlhttp.send(postStr);

                            }
                            //console.log(id);
                        }
                    </script>

                </div>

                <section id="comments">

                    <h3 id="comments-title">(<?php echo $comment_num; ?>) Comments</h3>

                    <ol class="commentlist">
                        <?php
                        $sql = "select *from comments where pid=".$pid;
                        $result = $mysql->getData($sql);
                        for($i = 0 ;$i<$comment_num; $i++){
                            $uid  = $result[$i]['uid'];
                            $sql = "select avatar from users where uid=".$uid;
                            $avatar = $mysql->getVar($sql);
                            $sql  = "select username from users where uid=".$uid;
                            $username = $mysql->getVar($sql);
                            echo '<li class="comment even thread-odd thread-alt depth-1" id="li-comment-4">
                                  <article id="comment-4">
                                  <a href="#">';
                            echo '<img alt="" src="'.$avatar.'" class="avatar avatar-60 photo" height="60" width="60">
                                  </a>
                                  <div class="comment-meta">
                                  <h5 class="author">';
                            echo '<cite class="fn"><a href="#" rel="external nofollow" class="url">'.$username.'</a></cite>
                                        - <a class="comment-reply-link" href="#">Reply</a>
                                  </h5>';
                            echo '<p class="date">
                                        <a href="#">
                                            <time datetime="'.$result[$i]['comment_time'].'">'.$result[$i]['comment_time'].'</time>
                                        </a>
                                  </p>';
                            echo '<div class="comment-body">'.$result[$i]['content'].'</div></article>';
                        }
                        ?>

                    </ol>

                    <div id="respond">

                        <h3>Leave a Reply</h3>

                        <div class="cancel-comment-reply">
                            <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Click here to cancel reply.</a>
                        </div>


                        <form action="action/add.php" method="post" id="commentform">
                            <input type="hidden" name="table" value="comment">
                            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                            <p class="comment-notes">Your must login. Required fields are marked <span class="required">*</span></p>
                            <div>
                                <label for="comment">Comment</label>
                                <textarea class="span8" name="comment" id="comment" cols="58" rows="10"></textarea>
                            </div>

                            <p class="allowed-tags">You can use these HTML tags and attributes <small><code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>

                            <div>
                                <?php
                                @$uid = $_SESSION['uid'];
                                if($uid != null){
                                    echo '<input class="btn" name="submit" type="submit" id="submit"  value="Submit Comment">';
                                }else{
                                    echo '<input class="btn" name="submit" type="submit" id="submit"  value="Submit Comment" readonly="readonly" disabled="disabled">';
                                }
                                ?>


                            </div>

                        </form>

                    </div>

                </section>
                <!-- end of comments -->

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
