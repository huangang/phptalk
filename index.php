<?php include("header.php");?>
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

                <!-- Basic Home Page Template -->
                <div class="row separator">
                    <section class="span4 articles-list">
                        <h3>Featured Articles</h3>
                        <ul class="articles">
                            <li class="article-entry standard">
                                <h4><a href="single.html">Integrating WordPress with Your Website</a></h4>
                                <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                                <span class="like-count">66</span>
                            </li>
                            <li class="article-entry standard">
                                <h4><a href="single.html">WordPress Site Maintenance</a></h4>
                                <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                <span class="like-count">15</span>
                            </li>
                            <li class="article-entry video">
                                <h4><a href="single.html">Meta Tags in WordPress</a></h4>
                                <span class="article-meta">23 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                <span class="like-count">8</span>
                            </li>
                            <li class="article-entry image">
                                <h4><a href="single.html">WordPress in Your Language</a></h4>
                                <span class="article-meta">22 Feb, 2013 in <a href="#" title="View all posts in Advanced Techniques">Advanced Techniques</a></span>
                                <span class="like-count">6</span>
                            </li>
                            <li class="article-entry standard">
                                <h4><a href="single.html">Know Your Sources</a></h4>
                                <span class="article-meta">22 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                <span class="like-count">2</span>
                            </li>
                            <li class="article-entry standard">
                                <h4><a href="single.html">Validating a Website</a></h4>
                                <span class="article-meta">21 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                <span class="like-count">3</span>
                            </li>
                        </ul>
                    </section>


                    <section class="span4 articles-list">
                        <h3>Latest Articles</h3>
                        <ul class="articles">
                            <li class="article-entry standard">
                                <h4><a href="single.html">Integrating WordPress with Your Website</a></h4>
                                <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                                <span class="like-count">66</span>
                            </li>
                            <li class="article-entry standard">
                                <h4><a href="single.html">Using Javascript</a></h4>
                                <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Advanced Techniques">Advanced Techniques</a></span>
                                <span class="like-count">18</span>
                            </li>
                            <li class="article-entry image">
                                <h4><a href="single.html">Using Images</a></h4>
                                <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Designing in WordPress">Designing in WordPress</a></span>
                                <span class="like-count">7</span>
                            </li>
                            <li class="article-entry video">
                                <h4><a href="single.html">Using Video</a></h4>
                                <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in WordPress Plugins">WordPress Plugins</a></span>
                                <span class="like-count">7</span>
                            </li>
                            <li class="article-entry standard">
                                <h4><a href="single.html">WordPress Site Maintenance</a></h4>
                                <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                <span class="like-count">15</span>
                            </li>
                            <li class="article-entry standard">
                                <h4><a href="single.html">WordPress CSS Information and Techniques</a></h4>
                                <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Theme Development">Theme Development</a></span>
                                <span class="like-count">1</span>
                            </li>
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

