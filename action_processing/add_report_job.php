<?php
include 'init.php';
check_login();
check_sesion();
$conn = open();
$project_id = intval($_POST['project_id']);
$job_id = intval($_POST['job_id']);
$user_name = $conn->real_escape_string($_POST['user_id']);
$content = $_POST['ckeditor_value'];
$colum = $_POST['colum'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time_post = date("Y-m-d H:i:s");
$select_report = " SELECT * FROM `job` WHERE `id` = '$job_id' AND `project_id` = '$project_id';  ";
$report = select($conn, $select_report);
$data_report = $report[0][$colum];
$max = 100;
if (!$data_report) {
    $data = array(
        'rows' => array(
            array(
                'time' => $time_post,
                'content' => $content,
                "user" => $user_name
            )
        )
    );
}else{
    $data = json_decode($data_report, true);
    $data_new = array(
                'time' => $time_post,
                'content' => $content,
                "user" => $user_name
            );
    array_push($data['rows'], $data_new);
    if(count($data['rows'])>$max){
       unset($data['rows'][0]);
    }
}
$json_result = $conn->real_escape_string(json_encode($data));
$insert_report_job = " UPDATE `job` SET `$colum` = '$json_result' where `id` = '$job_id' AND `project_id` = '$project_id' ";
query($conn, $insert_report_job);
close($conn);
?>