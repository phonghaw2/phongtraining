<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./css/bootstrap1.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="crm_body_bg">
    <?php require_once '../app/views/layouts/sidebar.php' ?>

    <section class="main_content dashboard_part large_header_bg">
        <?php require_once '../app/views/layouts/header.php' ?>
        <div class="main_content_iner">
            <?php require_once '../app/views/'.$content.'.php' ?>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.28/dist/sweetalert2.all.min.js"></script>
   
</body>

</html>