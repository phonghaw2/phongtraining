<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
                                    <li class="breadcrumb-item active">All</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30 pt-4">
                            <div class="white_card_body">
                                <div class="QA_section">
                                    <div class="white_box_tittle list_header">
                                        <h4>Category List </h4>
                                        <div class="box_right d-flex lms_block">                                        
                                            <div class="add_button ms-2">
                                                <a href="export" class="btn_1">Export CSV</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="QA_table mb_30">
                                        <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">amount_post</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($categories as $category) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $category['id'] ?></th>
                                                        <td><?php echo $category['name'] ?></td>
                                                        <td><?php echo $category['mount'] ?></td>
                                                        <td>
                                                            <a class="edit-btn" data-id="<?php echo $category['id'] ?>" data-name="<?php echo $category['name'] ?>">
                                                                <i class='bx bx-edit' ></i>
                                                            </a>
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                        </table>                                                                          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->view('category/modal') ?>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.28/dist/sweetalert2.all.min.js"></script>
    <script>
        $('.edit-btn').click(function (e) {
            let id = $(this).data('id');
            let name = $(this).data('name');
            $('.box-lightbox').addClass('open');
            $('#name-cate').attr('placeholder', name);
            $('#id-cate').val(id);
        });
        $('.js-lightbox-close').click(function (e) {
            $('.box-lightbox').removeClass('open');
        });
        $(document).on('change', '#name-cate', function () {
            $('#updateCategory').attr('disabled', false);
        });
    </script>
</body>

</html>