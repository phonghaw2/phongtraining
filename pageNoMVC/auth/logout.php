<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['fullname']);


if (isset($_COOKIE['remember'])) {
    unset($_COOKIE['remember']); 
    setcookie('remember', null, -1, '/'); 
    return true;
} else {
    return false;
}

session_destroy();
// unset($_COOKIE['remember']);
// setcookie('remember',null,-1);

header("location:../");
exit;
?>