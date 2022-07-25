<?php

include "./config.php";
$selectQuery = "select * from students";
$selectQueryResult = mysqli_query($conn,$selectQuery);
$output = "";
if(mysqli_num_rows($selectQueryResult) > 0){
    $output = "
    <table cellpadding='10px'>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Course Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
    ";
    while($row = mysqli_fetch_assoc($selectQueryResult)){
        $output .= "
        <tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}  {$row['last_name']}</td>
                <td>{$row['subject']}</td>

                <td>
                    
                    <button class='edit-btn' data-id = '{$row['id']}'>Edit</button>
                    
                </td>

                <td>
                    <button class='delete-btn' data-id = '{$row['id']}'>Delete</button>
                </td>

    </tr>";
    }

    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
}





?>

