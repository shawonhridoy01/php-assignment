<?php 
include "config.php";
$id = $_POST["id"];


include "./config.php";
$selectQuery = "select * from students where id = '{$id}'";
$selectQueryResult = mysqli_query($conn,$selectQuery);
$output = "";

    if(mysqli_num_rows($selectQueryResult) > 0){
        while($row = mysqli_fetch_assoc($selectQueryResult)){
            $updateOutput = "
                <form class='row g-3' id='my_form'>
    
    
                    <div class='col-12'>
                    
                        <input type='hidden' class='form-control' id='id' placeholder='Enter Your Id' value = {$row['id']}>
                    </div>
                    <div class='col-12'>
                            <label for='first_name' class='form-label'>First Name</label>
                            <input type='text' class='form-control' id='fname' placeholder='Enter First Name' value = {$row['first_name']}>
                    </div>
    
                    <div class='col-12'>
                        <label for='last_name' class='form-label'>First Name</label>
                        <input type='text' class='form-control' id='lname' placeholder='Enter Last Name' value = {$row['last_name']}>
                    </div>
                    <div class='col-12'>
                        <label for='last_name' class='form-label'>Subject</label>
                        <input type='text' class='form-control' id='usubject' placeholder='Enter Subject Name' value = {$row['subject']}>
                    </div>
    
    
                    <div class='col-12'>
                        <input type='submit' value='Update Data' id='update_btn' class='btn btn-primary update_btn'>
                    </div>
                    </form>
            ";
            
        }
        echo $updateOutput;
    }
