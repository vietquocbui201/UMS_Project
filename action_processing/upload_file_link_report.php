<?php
include 'init.php';
check_login();
check_sesion();
$conn = open();
$code_video = isset($_POST['code']) ? $_POST['code'] : '';
$img_name = isset($_POST['img_name']) ? $_POST['img_name'] : '';
$url = isset($_POST['text_link']) ? $_POST['text_link'] : '';
$title_link = isset($_POST['title_link']) ? $_POST['title_link'] : '';
$filename = isset($_POST['filename']) ? $_POST['filename'] : '';

$job_id = $_POST['job_id'];
$select_link_report = "SELECT * FROM `job` WHERE `id`=$job_id";
$link_report = select($conn, $select_link_report);
$data_report = $link_report[0]['report_link'];

if ($data_report) {
    $data = json_decode($data_report, true);
    if (!empty($code_video)) {
        array_push($data['video'], $code_video);
    }
    if (!empty($img_name)) {
        array_push($data['img'], $img_name);
    }
    if (!empty($url)) {
        array_push($data['link'],  $url);
    }
    if (!empty($filename)) {
        array_push($data['file'], $filename);
    }
} else {
    $data = array(
        'video' => array(),
        'img' => array(),
        'link' => array(),
        'file' => array()
    );
    if (!empty($code_video)) {
        array_push($data['video'], $code_video);
    }
    if (!empty($img_name)) {
        array_push($data['img'], $img_name);
    }
    if (!empty($url)) {
        array_push($data['link'], $url);
    }
    if (!empty($filename)) {
        array_push($data['file'], $filename);
    }
}

$data_report = json_encode($data);
$json_result = $conn->real_escape_string(json_encode($data));
$insert_report_job = " UPDATE `job` SET `report_link` = '$json_result' where `id` = '$job_id'; ";
query($conn, $insert_report_job);
close($conn);
?>
