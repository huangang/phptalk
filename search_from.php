<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/27
 * Time: 上午10:17
 */
?>
<!-- Start of Search Wrapper -->
<div class="search-area-wrapper">
    <div class="search-area container">
        <h3 class="search-header">Have a Question?</h3>
        <p class="search-tag-line">If you have any question you can ask below or enter what you are looking for!</p>

        <form id="search-form" class="search-form clearfix" method="get" action="search.php" autocomplete="off">
            <input class="search-term required" type="text" id="s" name="s" placeholder="Type your search terms here" title="* Please enter a search term!" />
            <input class="search-btn" type="submit" value="Search" />
            <div id="search-error-container"></div>
        </form>
    </div>
</div>
<!-- End of Search Wrapper -->