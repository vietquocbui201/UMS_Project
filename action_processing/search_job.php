<?php
include 'init.php';
check_login();
check_sesion();





















$conn = open();
$start_date = $_POST['start_date_search'];
$end_date = $_POST['end_date_search'];
$status= $_POST['status_search'];
$option1= $_POST['option1_search'];
$option2= $_POST['option2_search'];
$option3= $_POST['option3_search'];
$option4= $_POST['option4_search'];
$option5= $_POST['option5_search'];
$project_id = $_POST['project_id'];

$search = " 
SELECT * FROM `job` 
WHERE (`type` = 'job') AND (`startdate` BETWEEN '$start_date' AND '$end_date') AND (`enddate` BETWEEN '$start_date' AND '$end_date') ";
if($status != 0){
    $search=$search."AND ('status' IS NOT NULL AND `status` = '$status')";
}
if($option1 != 0){
    $search=$search."AND (`option1` IS NOT NULL AND `option1` = '$option1')";
}
if($option2 != 0){
    $search=$search."AND (`option2` IS NOT NULL AND `option2` = '$option2')";
}
if($option3 != 0){
    $search=$search."AND (`option3` IS NOT NULL AND `option3` = '$option3')";
}
if($option4 != 0){
    $search=$search."AND (`option4` IS NOT NULL AND `option4` = '$option4')";
}
if($option5 != 0){
    $search=$search."AND (`option5` IS NOT NULL AND `option5` = '$option5')";
}
$data_search = select($conn, $search);
$data_json = json_encode($data_search);
echo($data_json);
close($conn);
?>