<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Posts</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Please fill out the information completely</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="createPostAction" method="post" id="add-product-form" class="form-horizontal col-lg-12 mb-5 d-flex" enctype="multipart/form-data">
                                    <div class="col-4">
                                        <div class="upload-file px-5">
                                            <label for="feature_image" class="upload-file-label">
                                                <i class='bx bx-image-add'></i>
                                                Image
                                            </label>
                                            <input type="file" name="feature_image" id="feature_image" oninput="pic.src= window.URL.createObjectURL(this.files[0])">
                                            <img id="pic" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <label class="form-label" for="post-title">Title</label>
                                                <input type="text" class="form-control" id="post-title" name="title" value="">
                                            </div>                                         
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="6" name="content" id="post-content" width="100%" height="400px"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add product</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.28/dist/sweetalert2.all.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckfinder/ckfinder.js"></script>
    <script>
        

        var editor = CKEDITOR.replace( 'post-content',);
        // CKEDITOR.config.extraPlugins='colorbutton';
        CKFinder.setupCKEditor( editor );


    </script>
    <?php if (isset($_SESSION['importSuccess'])) { ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php unset($_SESSION['importSuccess']);
    }  ?>

    <?php if (isset($_SESSION['invalid'])) { ?>
        <script>
            Swal.fire(
                'Something went wrong',
                'Please upload a valid CSV file.',
                'question'
            )
        </script>
    <?php unset($_SESSION['invalid']);
    }  ?>

    <?php if (isset($_SESSION['importError'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        </script>
    <?php unset($_SESSION['importError']);
    }  ?>

</body>

</html>