<?php 
session_start();
if (!isset($_SESSION["user"])) die();
$con= OpenCon();
$email= $_SESSION["user"];
$select_user = "select * from userregistrationtable where email='$email'";
$query= mysqli_query($con, $select_user);
$row = mysqli_fetch_array($query);
$code = $row['code'];
if ($code != md5(session_id())) die();
?>