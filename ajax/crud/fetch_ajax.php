
<?php

$conn = mysqli_connect("localhost","root","","load_data") or die("Connect Failed");

$id = $_POST["id"];

$sql = "select * from studenttable where id = '{$id}'";
$sqlResult = mysqli_query($conn,$sql);
$output = "";

if(mysqli_num_rows($sqlResult) > 0){
    
    while($row = mysqli_fetch_assoc($sqlResult)){
        $id = $row["id"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];

        $output = "
        <table  cellspacing= '20px' width='100%' cellpadding = '20px' id='update_table'>
        <tr>
        <td>First Name</td>
        <td>
        <input type='hidden' name='editId' id='editId' value='{$id}'>
        <input type='text' name='updateFirstName' id='updateFirstName' value='{$first_name}'>
        </td>
    </tr>       
    
    <tr>
        <td>Last Name</td>
        <td>    
            <input type='text' name='updateLastName' id='updateLastName'  value= '{$last_name}'>
        </td>
    </tr>    
    
    <tr>
        <td>
        <input type='submit' name='updateBtn' id='updateBtn'>
        </td>
    </tr>";
    }
}
    $output .= "</table>";
    echo $output;
    mysqli_close($conn);

?>

 	 	<!-- last_name -->
                            <!-- <tr>
                                <td>First Name</td>
                                <td>
                                <input type='text' name='updateFirstName' id='updateFirstName'>
                                </td>
                            </tr>       
                            
                            <tr>
                                <td>Last Name</td>
                                <td>    
                                    <input type='text' name='updateLastName' id='updateLastName'>
                                </td>
                            </tr>    
                            
                            <tr>
                                <td><input type='submit' name='updateBtn' id='updateBtn'>
                                </td>
                            </tr> -->