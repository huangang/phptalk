<?php
/**
 * Created by PhpStorm.
 * User: huangang
 * Date: 15/5/24
 * Time: 下午6:32
 */
session_start();
session_destroy();
echo '<script>window.location.href="index.php";</script>';