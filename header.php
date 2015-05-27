<?php
session_start();
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午2:06
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="zh-CN"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="zh-CN"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="zh-CN"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="zh-CN"> <!--<![endif]-->
<head>
    <!-- META TAGS -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Knowledge</title>

    <link rel="shortcut icon" href="images/favicon.png" />




    <!-- Style Sheet-->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel='stylesheet' id='bootstrap-css-css'  href='css/bootstrap.css' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css-css'  href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='pretty-photo-css-css'  href='js/prettyphoto/prettyPhotoaeb9.css' type='text/css' media='all' />
    <link rel='stylesheet' id='main-css-css'  href='css/main.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css-css'  href='css/custom.html' type='text/css' media='all' />


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script></script>
   <![endif]-->

</head>
<body>
<!-- Start of Header -->
<div class="header-wrapper">
    <header>
        <div class="container">


            <div class="logo-container">
                <!-- Website Logo -->
                <a href="index.php"  title="Knowledge Base Theme">
                    <img src="images/logo.png" alt="Knowledge Base Theme">
                </a>
                <span class="tag-line">Premium PHP TALK</span>
            </div>


            <!-- Start of Main Navigation -->
            <nav class="main-nav">
                <div class="menu-top-menu-container">
                    <ul id="menu-top-menu" class="clearfix">
                        <li class="current-menu-item"><a href="index.php">Home</a></li>
                        <?php
                        if(isset($_SESSION['uid']) && $_SESSION['uid'] != null){
                            $role = $_SESSION['role'];
                            ?>
                            <li><a href="admin">Admin</a></li>
                            <?php
                            if($role == 'ordinary'){
                                echo '<li><a href="admin/ordinary/#1/11">Post</a></li>';
                            }elseif($role == 'manager'){
                                echo '<li><a href="admin/administrators/#1/11">Post</a></li>';
                            }
                            ?>

                            <li><a href="exit.php">EXit</a></li>
                        <?php
                        }else {
                            ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        <?php
                        }
                        ?>
<!--                        <li><a href="#">More</a>-->
<!--                            <ul class="sub-menu">-->
<!--                                <li><a href="#">Full Width</a></li>-->
<!--                                <li><a href="#">Elements</a></li>-->
<!--                                <li><a href="#">Sample Page</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="#">Contact</a></li>-->
                    </ul>
                </div>
            </nav>
            <!-- End of Main Navigation -->

        </div>
    </header>
</div>
<!-- End of Header -->