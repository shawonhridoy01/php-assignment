<?php 
    // header("location:{$dir}/controller/userController.php");/
$host = "localhost";
$username = "root";
$password = "";
$dbName = "newssite";
$dir = "http://localhost/php/news-template/admin";
$conn = mysqli_connect($host,$username,$password,$dbName) or  die("query failed");

function paragraphTrim($para,$numberOfWord=20){
    $totalWordArray = str_word_count($para,1);
    for($i=1;$i<$numberOfWord;$i++){
        echo $totalWordArray[$i]." ";
    }

}


?>