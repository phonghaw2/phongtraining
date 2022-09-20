<?php  
    require_once 'isset_token.php';
    //  var_dump($_COOKIE['remember']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phong-Training</title>
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
</head> 
</head>
<body>
    <?php 
        require_once "views/header-blade.php";
    ?>
    <div class="d-flex justify-content-center align-items-center auth" style="margin-top:32px ;">

        <?php if(!empty($_SESSION['id'])){  ?>

            <a href="auth/logout.php"  class="btn btn-outline-dark mb-3">Log out</a>

        <?php } else { ?>
            <a href="auth/login-blade.php"  class="btn btn-outline-dark mb-3">Login</a>
            <a href="auth/signup-blade.php"  class="btn btn-outline-dark mb-3">Register</a>
        <?php  }  ?>
        
    </div>
</body>
</html>