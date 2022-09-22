<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap1.min.css">
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="crm_body_bg">
    <?php require_once "./App/views/layouts/sidebar.php"; ?>
    
    <section class="main_content dashboard_part large_header_bg">
        <?php require_once "./App/views/layouts/header.php"; ?>
        <div class="main_content_iner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left d-flex align-items-center">
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">Add</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="white_card_body">
                        <div class="white_box_tittle list_header">
                            <h4>User List </h4>
                            <div class="box_right d-flex lms_block col-sm-8">                                        
                            <form action="importData" method="post" enctype="multipart/form-data">
                                <input type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                                <input type="submit" class="btn btn-primary" name="importSubmit" value="Import(CSV)">
                            </form>
                            </div>
                        </div>
                        <form class="col-sm-8" method="post" action="addUserAction">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="form-label col-sm-4 col-form-label">Full name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="form-label col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <?php if(isset($_SESSION['error'])) { ?>
                                        <span class="text-strong textdanger">Email already in use</span>        
                                    <?php unset($_SESSION['error']); }  ?> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="form-label col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control"  name="password" placeholder="Password">
                                </div>
                            </div>
                            <fieldset class="">
                                <div class="row">
                                    <div class="col-form-label col-sm-4 pt-0">Role</div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="admin" checked="">
                                            <label class="form-label form-check-label" for="gridRadios1">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="customer">
                                            <label class="form-label form-check-label" for="gridRadios2">
                                                Creater
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="gridRadios3" value="customer">
                                            <label class="form-label form-check-label" for="gridRadios3">
                                                Publicer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class=" row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.28/dist/sweetalert2.all.min.js"></script>
        <?php if(isset($_SESSION['importSuccess'])) { ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>     
        <?php unset($_SESSION['importSuccess']); }  ?> 

        <?php if(isset($_SESSION['invalid'])) { ?>
            <script>
                Swal.fire(
                'Something went wrong',
                'Please upload a valid CSV file.',
                'question'
                )
            </script>     
        <?php unset($_SESSION['invalid']); }  ?> 

        <?php if(isset($_SESSION['importError'])) { ?>
            <script>
               Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                })
            </script>     
        <?php unset($_SESSION['importError']); }  ?> 

</body>

</html>