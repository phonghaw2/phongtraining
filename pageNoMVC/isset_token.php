<?php 
session_start();
if(isset($_COOKIE['remember'])){
    $token = $_COOKIE['remember'];
    require_once 'connect.php';
   
    $sql = "select * from user
    where token = '$token' limit 1";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);
    if($number_rows == 1 ){
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['fullname'] = $each['fullname'];
    };
    mysqli_close($connect);
};

?>