<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <link rel="stylesheet" href="../public/css/bootstrap1.min.css">
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="col-lg-12">
<div class="white_box mb_30">
<div class="row justify-content-center">
<div class="col-lg-6">

<div class="modal-content cs_modal">
<div class="modal-header theme_bg_1 justify-content-center">
<h5 class="modal-title text_white">Resister</h5>
</div>
<div class="modal-body">
<form method="post" action="/auth/register_action" >
<div class="">
<input type="text" class="form-control" name="fullname" placeholder="Full Name">
</div>
<div class="">
<input type="email" class="form-control" name="email" placeholder="Enter your email">
</div>
<div class="">
<input type="password" class="form-control" name="password" placeholder="Password">
</div>
<div class=" cs_check_box">
<input type="checkbox" id="check_box" class="common_checkbox">
<label for="check_box"> Keep me up to date </label>
</div>
<button type="submit" name="btnRegister" class="btn_1 full_width text-center">Sign Up</button>

<p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal" href="#">Log in</a></p>
<div class="text-center">
<a href="#" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>

