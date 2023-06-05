<?php
include 'init.php';
check_all("user", true);
$conn = open();
$date = $conn->real_escape_string($_POST['date']);
$content = $conn->real_escape_string($_POST['content']);
$from = intval($_POST['from']);
$job_id = intval($_POST['job_id']);
$to = intval($_POST['to']);
$cost = $conn->real_escape_string($_POST['cost']);
$insert_diary = " INSERT INTO `Diary`(`content`, `date`, `from`, `to`, `cost`, `job_id`) VALUES ('$content','$date','$from','$to','$cost','$job_id') ";
query($conn, $insert_diary);
echo mysqli_insert_id($conn);
close($conn);
?>