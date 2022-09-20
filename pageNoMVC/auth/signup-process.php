<?php  


    $fullname = addslashes($_POST['fullname']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    
    require_once '../connect.php';
    $sql = "select count(*) from user where email = '$email'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];

    if($number_rows == 1) {
        session_start();
        $_SESSION['error'] = 'Email already used';
        header('location:signup-blade.php');
        exit;
    }

    $sql = "insert into user(fullname,email,password)
    value ('$fullname','$email','$password')";
    mysqli_query($connect,$sql);


    
    header('location:login-blade.php');
    mysqli_close($connect);

?>