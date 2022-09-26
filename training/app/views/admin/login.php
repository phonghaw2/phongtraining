<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
                        <div class="modal-header justify-content-center theme_bg_1">
                            <h5 class="modal-title text_white">Log in</h5>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="loginAction">
                                <div class="">
                                    <input type="text" name="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                <button class="btn_1 full_width text-center">Log in</button>
                                <p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal" href="signup"> Sign Up</a></p>
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