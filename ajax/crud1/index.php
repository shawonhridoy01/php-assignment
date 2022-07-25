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

    <section id="main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="margin-bottom: 30px;">PHP Ajax Crud using JQuery UI Dialoge</h2>

                        <!-- alert start  -->
                        <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> -->
                            <div style="color: white;"><h1 id="message-box" ></h1></div>
                            <div class="search-box" style="text-align: right;">
                                <input type="text"  id="search" style="padding: 7px 30px;" autocomplete="off">
                                
                            </div>
                            <table cellpadding="10px" id="search_table">

                    
                            </table>
                            <!-- alert start end -->
                            <button class="add_btn">Add New</button>
                    
                    <table cellpadding="10px" id="main_table">

                    
                    </table>

                    <div id="modal">
                        <div id="modal-form">
                            <h2 style="color: black;">Add New Data</h2>
                        
                            <!-- form start   -->
                            <form class="row g-3" id="my_form">


                                <div class="col-12">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" placeholder="Enter First Name">
                                </div>

                                <div class="col-12">
                                    <label for="last_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
                                </div>
                                <div class="col-12">
                                    <label for="last_name" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Enter Subject Name">
                                </div>
                                

                                <div class="col-12">
                                    <input type="submit" value="Add New Data" id="submit_btn" class="btn btn-primary">
                                </div>
                            </form>
                            <!-- form start  end -->


                            <!-- close btn  -->
                            <div class="close-btn">X</div>
                            <!-- close btn end -->

                        </div>
                    </div>

                    <!-- update modal box  -->

                        
                    <div id="modal-update">
                        <div id="modal-form-update">
                            <h2 style="color: black;">Update Your Data</h2>
                        
                            <!-- form start   -->
                            <form class="row g-3" id="update_form">


                            </form>
                            <!-- form start  end -->

                                <!-- close btn  -->
                                <div class="update-close-btn">X</div>
                            <!-- close btn end -->

                        

                        </div>
                    </div>

                

                </div>
            </div>
        </div>
    </section>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function(){

        // show popup by clicking btn 
            $(".add_btn").on("click",function(){
                $("#modal").show(300);
            })
            
            // hide popup by clicking btn 
            $(".close-btn").on("click",function(){
                $("#modal").hide(300);
            })


                    // load data by ajax 
            function loadTable(){
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function(data){
                        $("#main_table").html(data);
                    }
                })
            }
            loadTable();
            // insert query by ajax 
            $("#submit_btn").on("click",function(e){
                e.preventDefault();
                let first_name = $("#first_name").val(); 
                let last_name = $("#last_name").val();
                let subject      = $("#subject").val();
            

                if(first_name == "" || last_name == "" || subject == ""){
                    $("#message-box").text("All field is required");
                }else{
                    $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data : { fname: first_name, lname: last_name, subject:subject},
                    success:function(data){
                        if(data == 1){
                            loadTable();
                            $("form").trigger("reset");
                            $("#message-box").text("Data Inserted Successfully");
                            $("#modal").hide();
                        }else{
                            $("#message-box").text("Data Insertion Failed");
                            $("#modal").hide();
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
                    url:"ajax-delete.php",
                    type: "POST",
                    data: {id : id},
                    success: function(data){
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                            $("#message-box").text("Data Delete Successful");
                            loadTable();
                        }else{
                            $("#message-box").text("Data Delete Failed");
                        }
                    }
                })
                }
            })

            
            // data delete by ajax end 


            // updateing pop up modal box 
                // show popup by clicking btn 
                $(document).on("click",".edit-btn",function(){
                $("#modal-update").show(300);

                let id = $(this).data("id");
            

                $.ajax({
                    url : "ajax-update.php",
                    type: "POST",
                    data : {id:id},
                    success: function(data){
                        $("#update_form").html(data);
                    }
                })
            })
            

            // update data by using ajax  
            
            // $(document).on("click","#update_btn",function(){
                
            //     let id = $("#id").val();
            //     let fname = $("#fname").val();
            //     let lname = $("#lname").val();
            //     let usubject = $("#usubject").val();
                
            //     $.ajax({
            //         url : "ajax-update-data.php",
            //         type: "POST",
            //         data :{id:id,fname:fname,lname:lname,subject:usubject},
            //         success: function(data){
            //             if(data == 1){
            //                 $("#message-box").text("Your data has been updated successfully");
            //                 $("#modal").hide();
            //             }else{
            //                 $("#message-box").text("Your data is not updated");
            //                 $("#modal").hide();
            //             }
            //         }
            //     })
            // })

                // save update form 
                $(document).on("click",".update_btn",function(e){
                    e.preventDefault();
                let id = $("#id").val();
                let fname = $("#fname").val();
                let lname = $("#lname").val();
                let usubject = $("#usubject").val();

                $.ajax({
                    url: "ajax-update-data.php",
                    type: "POST",
                    data : {id:id,fname:fname,lname:lname,subject:usubject},
                    success: function(data){
                        if(data == 1){
                            $("#message-box").text("Your data has been updated successfully");
                            loadTable();
                            $("#modal-update").hide(.300)
                        }else{
                            $("#message-box").text("Update Failed")
                            $("#modal-update").hide(.300)
                        }
                    }
                })
            })


            // update data by ajax end 


            // hide popup by clicking btn 
            $(".update-close-btn").on("click",function(){
                $("#modal-update").hide(300);
            })


                

            // live search ajax code 
            
            $("#search").on("keyup",function(){
                let searchVal = $(this).val();
                $.ajax({
                    url: "ajax-search.php",
                    type: "POST",
                    data : {searchVal:searchVal},
                    success: function(data){
                        $("#main_table").html(data);
                        // let MainValue = $("#main_table").html(data);
                        // let searchValue = $("#search_table").html(data);
                        // MainValue.replaceWith(searchValue);                 
                    }
                })
            })










            

         // ready end 
            
        })

    </script>

</body>

</html>