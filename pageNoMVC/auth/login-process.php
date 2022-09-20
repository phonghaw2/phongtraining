<?php  
 
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    
    require_once '../connect.php';
    $sql = "select * from user 
    where email = '$email' and password = '$password'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);

    if($number_rows == 1) {
        session_start();
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION['fullname'] = $each['fullname'];
        $_SESSION['id'] = $id;
        $token = uniqid('user_', true) . time();
        $sql = "update user
        set
        token = '$token' where id = '$id'";
        mysqli_query($connect,$sql);
        setcookie('remember', $token, time() + 86400*30, '/');
        // var_dump($_COOKIE['remember']);
        header("location:../");
        exit;
    } else {
        session_start();
        $_SESSION['error'] = 'Login False';
        header('location:login-blade.php?error=Login False');
    };
   


    mysqli_close($connect);

?>