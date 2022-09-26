<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ALL User</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/bootstrap1.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="crm_body_bg">
    <?php require_once '../app/views/layouts/sidebar.php' ?>

    <section class="main_content dashboard_part large_header_bg">
        <?php require_once '../app/views/layouts/header.php' ?>
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
                                        <h4>User List </h4>
                                        <div class="box_right d-flex lms_block">
                                            <div class="serach_field_2">
                                                <div class="search_inner">
                                                    <form active="">
                                                        <div class="search_field">
                                                            <input type="search" name="search" id="search" value="">
                                                        </div>
                                                        <button type="submit"><i class='bx bx-search-alt-2' style="font-size:16px;"></i></button>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                            
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
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $each) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $each['id'] ?></th>
                                                        <td><?php echo $each['name'] ?></td>
                                                        <td><?php echo $each['email'] ?></td>
                                                        <td><?php echo $each['role'] ?></td>
                                                        <td>
                                                            <a class="edit-btn" data-id="<?php echo $each['id'] ?>" data-name="<?php echo $each['name'] ?>" data-email="<?php echo $each['email'] ?>" data-password="<?php echo $each['password'] ?>" data-role="<?php echo $each['role'] ?>">
                                                                <i class='bx bx-edit'></i>
                                                            </a>


                                                        </td>
                                                        <td>
                                                            <a class="delete-btn" data-id="<?php echo $each['id'] ?>">
                                                                <i class='bx bxs-trash'></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                        <li class="page-item">
                                            <!-- <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>&style=<?php echo $style ?>"> -->
                                            <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>" class="page-link">
                                                <?php echo $i  ?>
                                            </a>
                                        </li>
                                    <?php }  ?>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once '../app/views/admin/user/modal.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.28/dist/sweetalert2.all.min.js"></script>
    <script>
        $('.edit-btn').click(function(e) {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let email = $(this).data('email');
            let password = $(this).data('password');
            var role = $(this).data('role');
            $('.box-lightbox').addClass('open');
            $('#fullname').val(name);
            $('#email').val(email);
            $('#password').val(password);
            $('#' + role).attr('checked', 'checked');
        });
        $('.js-lightbox-close').click(function(e) {
            $('.box-lightbox').removeClass('open');
        });
        $(document).on('change', '#fullname', '#password', function() {
            $('#updateUser').attr('disabled', false);
        });
        $('input[type=radio][name=role]').change(function() {
            $('#updateUser').attr('disabled', false);
        });
        $('#edit-user-form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: "Change Saved",
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.reload(true);
                        };
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'something went wrong',
                    });
                }
            });
        });
        $('.delete-btn').click(function(e) {
            let deleteID = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/adminlte/admin/deleteUser?id=" + deleteID,
                        success: function() {
                            document.location.reload(true);
                        }
                    });
                }
            })
        });
        $('#edit-user-form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: "Change Saved",
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.reload(true);
                        };
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'something went wrong',
                    });
                }
            });
        });
    </script>
</body>

</html>