<?php

$conn = mysqli_connect("localhost","root","","load_data") or die("Connect Failed");


$sql = "select * from studenttable";
$sqlResult = mysqli_query($conn,$sql);
$output = "";
if(mysqli_num_rows($sqlResult) > 0){
    $output = '<table  cellspacing= "20px" width="100%" cellpadding = "20px" id="main_table">
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>';
    while($row = mysqli_fetch_assoc($sqlResult)){
        $id = $row["id"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $output .= '<tr>
         <td>'. $id. ' </td>
          <td>'. $first_name. " ". $last_name .'</td> 
         </tr>';
    }
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
}
?>
 	 	<!-- last_name -->