<?php
include "config.php";
$n_result = null;
if(isset($_POST["n_submit"])){
    $id = mysqli_real_escape_string($conn,$_GET["id"]);
    $title = mysqli_real_escape_string($conn,$_POST["n_title"]);
    $description = mysqli_real_escape_string($conn,$_POST["description"]);
    $icon = mysqli_real_escape_string($conn,$_POST["n_icon"]);
    $CategoryId = mysqli_real_escape_string($conn,$_POST["category_id"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

    $n_insertQuery = "INSERT INTO news(title,icon,description,pass,cid) VALUES ('$title','$icon','$description','$password','$CategoryId')";
    $n_result = mysqli_query($conn,$n_insertQuery);
    if($n_result){
        echo "data inserted successfully";
    }else{
        echo "data insertion failed".mysqli_error($conn);
    }
}



$readQuery = "select * from news";

$rquery = mysqli_query($conn,$readQuery);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php">My News</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />

                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="./admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->
                        <div class="sb-sidenav-menu-heading">Pages</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Category Form
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            News Form
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3 class="mt-4">Category Form</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol> -->
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <!-- form ================================================= -->
                        <form class="row g-3 mb-3" action="<?php  $_SERVER['PHP_SELF'] ?>" method="POST">
                            
                            <div class="col-7">
                                <label for="n_title" class="form-label">Enter News Title</label>
                                <input type="text" class="form-control " id="n_title" placeholder="Enter News Title" name="n_title" required>
                            </div>


                            <div class="col-7">
                                <label for="description" class="form-label">Enter Description</label>
                                <textarea name="description" id="description" cols="10" class="form-control "rows="10" placeholder="Add Description"></textarea>
                                
                            </div>

                            <div class="col-7">
                                <label for="n_icon" class="form-label">Enter Icon</label>
                                <input type="text" class="form-control " id="n_icon" placeholder="Enter  Icon" name="n_icon" required>
                            </div>

                            <div class="col-7">
                                <label for="category_id" class="form-label">Category Id</label>
                                <input type="number" class="form-control " id="category_id" placeholder="category_id" name="category_id" required>
                            </div>


                            <div class="col-7">
                                <label for="password" class="form-label">Enter Password</label>
                                <input type="text" class="form-control " id="password" placeholder="Enter  Password" name="password" required>
                            </div>



                            
                            <div class="col-7">
                                <button type="submit" class="btn btn-dark  w-100" name="n_submit">Add Post</button>
                                
                            </div>
                        </form>

                        <h1></h1>
                        <!-- form ================================================= -->
                        <div class="card mb-4 mt-5">

                            <div class="card-body">
                    
                        
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>News Title</th>
                                            <th>News Description</th>
                                            <th>News Icon</th>
                                            <th>Category Id</th>
                                            <th>Action</th>
                                        </tr>
                                <?php

                                        if(mysqli_num_rows($rquery) > 0 ){
                                            while($row = mysqli_fetch_assoc($rquery)){

                                            
                                    ?>
                                
                                        <tr>
                                            <td><?php echo $row["title"]; ?> </td>
                                            <td><?php echo $row["description"]; ?></td>
                                            <td><i class='<?php echo $row["icon"] ?>'></i></td>
                                            <td><?php echo $row["cid"]; ?></td>
                                            <td>
                                            <a href="n_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                                <a href="n_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                                <a href="details.php">Details</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php }else{

                                         ?>
                                        <tr>
                                        <td colspan="4"><?php echo "<h2> Data Not Found </h2>" ?></td>
                                        </tr>
                                            <?php  }?>
                                    </thead>
                                    <tfoot>
                                    
                                    </tfoot>
                                    <tbody>

                            
                                    </tbody>
                                </table>
                        
                            </div>
                        </div>
                </div>
            </main>
            <footer class="py-4  bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>