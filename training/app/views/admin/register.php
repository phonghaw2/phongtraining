<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="/css/bootstrap1.min.css">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/style.css">
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
                            <!-- <form method="POST" action="registerAction">
                            <?php if(isset($_SESSION['error'])) { ?>
                                <div class="alert text-white bg-danger">
                                    <div class="alert-text">
                                        <b>There was a problem sign up . Email already used .</b>
                                    </div>
                                </div>
                                                      
                            <?php unset($_SESSION['error']); }  ?>  -->
                            
                                <div class="">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                </div>
                                <div class="">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                </div>
                                <div class="">
                                    <input type="password" class="form-control" name="password" placeholder="Password" >
                                </div>
                               
                                <button class="btn_1 full_width text-center">Sign Up</button>

                                <p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal" href="login">Log in</a></p>
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