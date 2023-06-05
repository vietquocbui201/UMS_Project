<?php
if(!isset($_POST['code'])){
    $_SESSION["error"] ='ERROR';
    header('Location:index.php');
    exit();
}
if(!isset($_GET['email'])){
    $_SESSION["error"] ='NOT EMAIL';
    header('Location:index.php');
    exit();
}
include 'action_processing/init.php';
$con= open();
    $code_input =trim($_POST['code']," ");
    $email=$con->real_escape_string($_GET['email']);
    $select_user = "select * from `users` where `email`='$email'";
    $query= mysqli_query($con, $select_user);
    $row = mysqli_fetch_array($query);
    $code=$row['code'];
    $id=$row['id'];
    $time=strtotime($row['updated']);
    $time_now = strtotime(date('Y-m-d H:i:s'));
    $ip=$_SERVER['REMOTE_ADDR'];
    if($code==$code_input && $time_now<$time){
        $sql="UPDATE `users` SET `last_login`=now(),`ip`='$ip' WHERE `email`='$email'";
        if($con->query($sql)===true) $_SESSION["user"] = $email;
        header('Location:manager.php');
        exit();
    }else{
        $_SESSION["error"] ='Code does not match';
        header('Location:index.php');
        exit();
    }
$close=CloseCon($con);
?>