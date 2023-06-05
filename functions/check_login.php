<?php 
 if(!isset($_SESSION["user"])) {
    header('Location:login.php');
    exit();
 }
$con= OpenCon();
$email= $_SESSION["user"];
$select_user = "select * from user where email='" . $con->real_escape_string($email) . "'";
$query= mysqli_query($con, $select_user);
$row = mysqli_fetch_array($query);
$code=$row['code'];
if($code!=md5(session_id())){
    header('Location:login.php');
    exit();
}
    
?>