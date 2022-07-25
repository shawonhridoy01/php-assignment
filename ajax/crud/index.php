<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="container">
        <div class="row">
            <h1 id="message">Hello World</h1>
        
        </div>

        <div class="row second-row">
                <form method="POST" id="add_form">
                    <input type="text" name="first_name" id="first_name">
                    <input type="text" name="last_name" id="last_name">
                    <input type="submit" value="Add" id="submit_btn">
                </form>

            <table  cellspacing= "20px" width="100%" cellpadding = "20px" id="main_table">
            </table>
            <div id="modal">
                    <div id="modal-form">
                        <h2>Edit Form</h2>
                        <table  cellspacing= "20px" width="100%" cellpadding = "20px" id="update_table">
                        
            </table>

            <div id="close-btn">X</div>
                    </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
                // load data by ajax 
            function loadTable(){
                $.ajax({
                    url: "data-load.php",
                    type: "POST",
                    success: function(data){
                        $("#main_table").html(data);
                    }
                })
            }
            // insert query by ajax 
            loadTable();
            $("#submit_btn").on("click",function(e){
                e.preventDefault();
                let first_name = $("#first_name").val(); 
                let last_name = $("#last_name").val();

                if(first_name == "" || last_name == ""){
                    $("#message").text("All field is required");
                }else{
                    $.ajax({
                    url: "ajax_insert.php",
                    type: "POST",
                    data : { fname: first_name, lname: last_name},
                    success:function(data){
                        if(data == 1){
                            loadTable();
                            $("#message").text("Data Inserted Successfully");
                            $("#add_form").trigger("reset");
                        }else{
                            $("#message").text("Data Insertion Failed");
                        }
                    }
                })
                }
            
            

            })


            // data delete by ajax 
            $(document).on("click",".delete-btn",function(){
                if(confirm("Do you really want delete this record ? ")){

            
                let id = $(this).data("id");
                let element = this
                $.ajax({
                    url:"ajax_delete.php",
                    type: "POST",
                    data: {studentId : id},
                    success: function(data){
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                            $("#message").text("Data Delete Successful");
                            loadTable();
                        }else{
                            $("#message").text("Data Delete Failed");
                        }
                    }
                })
                }
            })
            // data delete by ajax end 
            // fetch data in modal form 
            $(document).on("click",".edit-btn",function(){
                $("#modal").show();
                let sid = $(this).data("id"); 
                $.ajax({
                    url : "fetch_ajax.php",
                    type: "POST",
                    data : {id:sid},
                    success: function(data){
                        $("#update_table").html(data);
                    }
                })
                
            });
            // fetch data in modal form end
            

            // save update form 
            $(document).on("click","#updateBtn",function(){
                let stuId = $("#editId").val();
                let first_name = $("#updateFirstName").val();
                let last_name = $("#updateLastName").val();
                

                $.ajax({
                    url: "ajax-update-form.php",
                    type: "POST",
                    data : {id:stuId,first_name:first_name,last_name:last_name},
                    success: function(data){
                        if(data == 1){
                            $("#message").text("Data Updated Successfully");
                            loadTable();
                            $("#modal").hide(.300)
                        }else{
                            $("#message").text("Update Failed")
                            $("#modal").hide(.300)
                        }
                    }
                })
            })
            // hide modal box 
            $(document).on("click","#close-btn",function(){
                $("#modal").hide(1000);
            })
        
        })
    </script>

  </body>
</html>

