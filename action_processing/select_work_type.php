<?php
include "init.php";
$data = $_POST['Work_Group'];
$conn = open();
$select_work_type = " SELECT * FROM `work_type` WHERE group_id =' $data'; ";
$data_work_type = select($conn, $select_work_type);
echo json_encode($data_work_type);
close($conn);
?>