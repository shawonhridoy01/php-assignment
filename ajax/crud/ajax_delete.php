
<?php
$conn = mysqli_connect("localhost","root","","load_data") or die("Connect Failed");
$id = $_POST["studentId"];

$deleteQuery = "delete from studenttable where id = {$id}";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);

if($deleteQueryResult){
    echo 1;
}else{
    echo 0;
}

?>
