<?php
include("header.php");
require_once('class/saemysql.class.php');
$mysql = new SaeMysql();
?>

<!-- Start of Search Wrapper -->
<div class="search-area-wrapper">
    <div class="search-area container">
        <h3 class="search-header">Have a Question?</h3>
        <p class="search-tag-line">If you have any question you can ask below or enter what you are looking for!</p>

        <form id="search-form" class="search-form clearfix" method="get" action="#" autocomplete="off">
            <input class="search-term required" type="text" id="s" name="s" placeholder="Type your search terms here" title="* Please enter a search term!" />
            <input class="search-btn" type="submit" value="Search" />
            <div id="search-error-container"></div>
        </form>
    </div>
</div>
<!-- End of Search Wrapper -->

<!-- Start of Page Container -->
<div class="page-container">
    <div class="container">
        <div class="row">

            <!-- start of page content -->
            <div class="span8 page-content">

                <ul class="breadcrumb">
                    <li><a href="#">Knowledge Base Theme</a><span class="divider">/</span></li>
                    <li><a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a> <span class="divider">/</span></li>
                    <li class="active">Integrating WordPress with Your Website</li>
                </ul>

                <article class=" type-post format-standard hentry clearfix">

                    <h1 class="post-title"><a href="#">Integrating WordPress with Your Website</a></h1>

                    <div class="post-meta clearfix">
                        <span class="date">25 Feb, 2013</span>
                        <span class="category"><a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                        <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website">3 Comments</a></span>
                        <span class="like-count">66</span>
                    </div><!-- end of post meta -->
                    <?php
                    $pid = $_GET['pid'];
                    $sql = "select *from posts where pid=".$pid;
                    $result = $mysql->getLine($sql);
                    $content = $result['content'];
                    echo $content;

                    ?>

                </article>

                <div class="like-btn">

                    <form id="like-it-form" action="#" method="post">
                        <span class="like-it ">66</span>
                        <input type="hidden" name="post_id" value="99">
                        <input type="hidden" name="action" value="like_it">
                    </form>

                                                        <span class="tags">
                                                                <strong>Tags:&nbsp;&nbsp;</strong><a href="#" rel="tag">basic</a>, <a href="#" rel="tag">setting</a>, <a href="http://knowledgebase.inspirythemes.com/tag/website/" rel="tag">website</a>
                                                        </span>

                </div>

                <section id="comments">

                    <h3 id="comments-title">(3) Comments</h3>

                    <ol class="commentlist">

                        <li class="comment even thread-even depth-1" id="li-comment-2">
                            <article id="comment-2">

                                <a href="#">
                                    <img alt="" src="http://1.gravatar.com/avatar/50a7625001317a58444a20ece817aeca?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" class="avatar avatar-60 photo" height="60" width="60">
                                </a>

                                <div class="comment-meta">

                                    <h5 class="author">
                                        <cite class="fn">
                                            <a href="#" rel="external nofollow" class="url">John Doe</a>
                                        </cite>
                                        - <a class="comment-reply-link" href="#">Reply</a>
                                    </h5>

                                    <p class="date">
                                        <a href="#">
                                            <time datetime="2013-02-26T13:18:47+00:00">February 26, 2013 at 1:18 pm</time>
                                        </a>
                                    </p>

                                </div><!-- end .comment-meta -->

                                <div class="comment-body">
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                                </div><!-- end of comment-body -->

                            </article><!-- end of comment -->

                            <ul class="children">

                                <li class="comment byuser comment-author-saqib-sarwar bypostauthor odd alt depth-2" id="li-comment-3">
                                    <article id="comment-3">

                                        <a href="#">
                                            <img alt="" src="http://0.gravatar.com/avatar/2df5eab0988aa5ff219476b1d27df755?s=60&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" class="avatar avatar-60 photo" height="60" width="60">
                                        </a>

                                        <div class="comment-meta">

                                            <h5 class="author">
                                                <cite class="fn">saqib sarwar</cite>
                                                - <a class="comment-reply-link" href="#">Reply</a>
                                            </h5>

                                            <p class="date">
                                                <a href="#">
                                                    <time datetime="2013-02-26T13:20:14+00:00">February 26, 2013 at 1:20 pm</time>
                                                </a>
                                            </p>

                                        </div><!-- end .comment-meta -->

                                        <div class="comment-body">
                                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                                        </div><!-- end of comment-body -->

                                    </article><!-- end of comment -->

                                </li>
                            </ul>
                        </li>

                        <li class="comment even thread-odd thread-alt depth-1" id="li-comment-4">
                            <article id="comment-4">

                                <a href="#">
                                    <img alt="" src="http://1.gravatar.com/avatar/50a7625001317a58444a20ece817aeca?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" class="avatar avatar-60 photo" height="60" width="60">
                                </a>

                                <div class="comment-meta">

                                    <h5 class="author">
                                        <cite class="fn"><a href="#" rel="external nofollow" class="url">John Doe</a></cite>
                                        - <a class="comment-reply-link" href="#">Reply</a>
                                    </h5>

                                    <p class="date">
                                        <a href="http://knowledgebase.inspirythemes.com/integrating-wordpress-with-your-website/#comment-4">
                                            <time datetime="2013-02-26T13:27:04+00:00">February 26, 2013 at 1:27 pm</time>
                                        </a>
                                    </p>

                                </div><!-- end .comment-meta -->

                                <div class="comment-body">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                                </div><!-- end of comment-body -->

                            </article><!-- end of comment -->
                        </li>
                    </ol>

                    <div id="respond">

                        <h3>Leave a Reply</h3>

                        <div class="cancel-comment-reply">
                            <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Click here to cancel reply.</a>
                        </div>


                        <form action="#" method="post" id="commentform">


                            <p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>

                            <div>
                                <label for="author">Name *</label>
                                <input class="span4" type="text" name="author" id="author" value="" size="22">
                            </div>

                            <div>
                                <label for="email">Email *</label>
                                <input class="span4" type="text" name="email" id="email" value="" size="22" >
                            </div>

                            <div>
                                <label for="url">Website</label>
                                <input class="span4" type="text" name="url" id="url" value="" size="22" >
                            </div>


                            <div>
                                <label for="comment">Comment</label>
                                <textarea class="span8" name="comment" id="comment" cols="58" rows="10"></textarea>
                            </div>

                            <p class="allowed-tags">You can use these HTML tags and attributes <small><code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>

                            <div>
                                <input class="btn" name="submit" type="submit" id="submit"  value="Submit Comment">
                            </div>

                        </form>

                    </div>

                </section><!-- end of comments -->

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
