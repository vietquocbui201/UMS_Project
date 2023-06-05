<?php
include 'init.php';
check_login();
check_sesion();
$file = $_FILES;
$job_id = $_POST['job_id'];
$max_width = 600;
$max_height = 480;
$percent = 70;
$max_size = 3000000;
$function_name = $_GET['function_name'];

for($i=0; $i<count($file); $i++){
    $file_img = $file[$i];
    $array_data = array($file_img,$job_id);
    if ($function_name) {
        echo call_user_func_array($function_name, $array_data );
    }
}
echo 1;

function img_upload($file, $job_id)
{
    $position = "../assets/images/";
    $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $random=rand(0,100);
    $target_file = $position.date("Y-m-d-H:i:s").$random.".".$imageFileType;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!isset($file)) return 0;
    $check = getimagesize($file["tmp_name"]);
    if ($check == false) return 2;
    if (file_exists($target_file)) return 3;
    if ($file["size"] > 3000000) return 4;
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") return 5;
    if (!move_uploaded_file($file["tmp_name"], $target_file)) return 6;
    $img_name = date("Y-m-d-H:i:s") . $random . "." . $imageFileType;
    $conn = open();
    $select_link_report = "SELECT * FROM `job` WHERE `id`=$job_id";
    $link_report = select($conn, $select_link_report);
    close($conn);
    $data_report = $link_report[0]['report_link'];

    // OK

    if ($data_report) {
        $data = json_decode($data_report, true);
        if (!empty($code_video)) array_push($data['video'], $code_video);
        if (!empty($img_name)) array_push($data['img'], $img_name);
        if (!empty($url)) array_push($data['link'], $url);
        if (!empty($filename)) array_push($data['file'], $filename);
    }else{
        $data = array(
            'video' => array(),
            'img' => array(),
            'link' => array(),
            'file' => array()
        );
        if (!empty($code_video)) array_push($data['video'], $code_video);
        if (!empty($img_name)) array_push($data['img'], $img_name);
        if (!empty($url)) array_push($data['link'], $url);
        if (!empty($filename)) array_push($data['file'], $filename);
    }
    $conn = open();
    $json_result = $conn->real_escape_string(json_encode($data));
    $insert_report_job = " UPDATE `job` SET `report_link` = '$json_result' where `id` = '$job_id'; ";
    query($conn, $insert_report_job);
    close($conn);
}

function file_upload($file, $job_id){
    $position = "../assets/file/";
    $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $random=rand(0,100);
    $target_file = $position.$file['name'];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!isset($file)) return 0;
    if (file_exists($target_file)) return 3;
    if ($file["size"] > 1000000000) return 4;
    if ($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "zip"&& $imageFileType != "rar"&& $imageFileType != "xlsx"&& $imageFileType != "xls"&& $imageFileType != "txt"&& $imageFileType != "ppt"&& $imageFileType != "pptx") return 5;
    if (!move_uploaded_file($file["tmp_name"], $target_file)) return 6;
    $filename = $file['name'];
    $conn = open();
    $select_link_report = "SELECT * FROM `job` WHERE `id`=$job_id";
    $link_report = select($conn, $select_link_report);
    close($conn);
    $data_report = $link_report[0]['report_link'];

    // OK

    if ($data_report) {
        $data = json_decode($data_report, true);
        if (!empty($code_video)) array_push($data['video'], $code_video);
        if (!empty($img_name)) array_push($data['img'], $img_name);
        if (!empty($url)) array_push($data['link'], $url);
        if (!empty($filename)) array_push($data['file'], $filename);
    }else{
        $data = array(
            'video' => array(),
            'img' => array(),
            'link' => array(),
            'file' => array()
        );
        if (!empty($code_video)) array_push($data['video'], $code_video);
        if (!empty($img_name)) array_push($data['img'], $img_name);
        if (!empty($url)) array_push($data['link'], $url);
        if (!empty($filename)) array_push($data['file'], $filename);
    }
    $conn = open();
    $json_result = $conn->real_escape_string(json_encode($data));
    $insert_report_job = " UPDATE `job` SET `report_link` = '$json_result' where `id` = '$job_id'; ";
    query($conn, $insert_report_job);
    close($conn);
}

?>