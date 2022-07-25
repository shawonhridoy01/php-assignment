
<?php
$conn = mysqli_connect("localhost","root","","load_data") or die("Connect Failed");
$id = $_POST["id"];

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

// echo $updateQuery = "update set studenttable first_name = '{$first_name}' last_name = '{$last_name}', where id = '{$id}'";

$updateQuery = "UPDATE studenttable SET first_name='{$first_name}',last_name='{$last_name}' WHERE id = '{$id}' ";
$updateQueryResult = mysqli_query($conn,$updateQuery) or die("query faild");

if($updateQueryResult){
    echo 1;
}else{
    echo 0;
}

?>
