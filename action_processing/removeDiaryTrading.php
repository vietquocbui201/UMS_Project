<?php
include 'init.php';
check_all("user", true);
$conn = open();
$id = intval($_POST['id']);
$id_wallet = intval($_POST['id_wallet']);
$role = $conn->real_escape_string($_POST['role']);
$select_date = " SELECT * FROM `Diary` WHERE `id` = $id; ";
$date_time = select($conn, $select_date)[0]['date'];
$date_time_now = $date = date('Y-m-d H:i:s');

$date_time_obj = new DateTime($date_time);
$date_time_now_obj = new DateTime($date_time_now);
$diff = $date_time_now_obj->diff($date_time_obj);

$select_trades = " SELECT * FROM `Diary` WHERE `id`= $id; ";
$id_from = select($conn, $select_trades)[0]['from'];

if($id_from == $id_wallet || $role == 'admin' || $role=='root') {
    if ($diff->days < 1 || ($role == 'admin' || $role == 'root')) {
        $remove = " DELETE FROM `Diary` WHERE `id`= $id; ";
        query($conn, $remove);
        echo 1;
    } else {
        echo 2;
    }
}else{
    echo 3;
}

close($conn);