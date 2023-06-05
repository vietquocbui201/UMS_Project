<?php
include 'init.php';
check_all('manager', true);
$conn = open();
$number = intval($_POST['number']);
$id = intval($_POST['id']);
if ($number==1){
    $on_active = " UPDATE `project` SET status_project = 'active' WHERE id = $id; ";
    query($conn, $on_active);
    close($conn);
}elseif ($number == 0){
    $off_active = " UPDATE `project` SET status_project = 'in_active' WHERE id = $id; ";
    query($conn, $off_active);
    close($conn);
}
?>