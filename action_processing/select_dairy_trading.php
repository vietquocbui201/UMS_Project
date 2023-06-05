<?php
include 'init.php';
check_all("user", true);
$conn = open();
$id = intval($_POST['id']);
$Select_Diary = " SELECT * FROM `Diary` WHERE `job_id` = $id; ";
$data = select($conn, $Select_Diary);

$select_wallet = " SELECT * FROM `wallet`; ";
$data_wallet = select($conn, $select_wallet);

foreach ($data as $index => $Diary){
    foreach ($data_wallet as $wallet){
        if($Diary['from'] == $wallet['id'] ){
            $data[$index]['from'] = $wallet['name'];
        }
        if($Diary['to'] == $wallet['id'] ){
            $data[$index]['to'] = $wallet['name'];
        }
    }
}

echo json_encode($data);

close($conn);
?>