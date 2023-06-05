<?php
include 'init.php';
check_all('manager', true);
$conn = open();
$number = intval($_POST['number']);
$id = intval($_POST['job_id']);
$is_done = intval($_POST['done']);

if ($is_done == 0) {
    if ($number == 1) {
        $on_active = " UPDATE `job` SET `lock_active` = '1' WHERE id = $id; ";
        query($conn, $on_active);
        echo 1;
        close($conn);
    } elseif ($number == 0) {
        $off_active = " UPDATE `job` SET `lock_active` = '0' WHERE id = $id; ";
        query($conn, $off_active);
        close($conn);
        echo 0;
    }
}else if($is_done==1){
    if ($number == 1) {
        $date_now = date("Y-m-d");
        $on_done = " UPDATE `job` SET `done` = '1',`Completion_Time`= '".$date_now."' WHERE id = $id; ";
        query($conn, $on_done);
        echo 1;
        close($conn);
    } elseif ($number == 0) {
        $off_done = " UPDATE `job` SET `done` = '0' WHERE id = $id; ";
        query($conn, $off_done);
        close($conn);
        echo 0;
    }
}
?>