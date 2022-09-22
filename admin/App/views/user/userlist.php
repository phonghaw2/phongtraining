<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ALL User</title>
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
                                        <h4>User List </h4>
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
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $each) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $each['id'] ?></th>
                                                        <td><?php echo $each['fullname'] ?></td>
                                                        <td><?php echo $each['email'] ?></td>
                                                        <td><?php echo $each['role'] ?></td>
                                                        <td>
                                                            <a class="edit-btn" data-id="<?php echo $each['id'] ?>" >
                                                                <i class='bx bx-edit' ></i>
                                                            </a>
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
    </section>

</body>

</html>