
<?php

session_start();
session_destroy();
header("location:http://localhost/php/news-template/admin/index.php");
// header("location:{$dir}/index.php");



?>

