<?php
include 'init.php';
check_login();
check_sesion();
$conn = open();
$job_id = $_POST['job_id'];
$colum = $_POST['colum'];
$text = $_POST['text'];
$user_id = $_POST['user_id'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time_post = date("Y-m-d H:i:s");
$data = array(
            'time' => $time_post,
            'user' => $user_id,
            'content' => $text
            );
$json_result = $conn->real_escape_string(json_encode($data));
$insert_report_job = " UPDATE `job` SET `$colum` = '$json_result' where `id` = '$job_id' ";
query($conn, $insert_report_job);
close($conn);
?>