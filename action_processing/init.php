<?php
ini_set('memory_limit', '128M');
session_start();
$secret="amzgroup.vn";
date_default_timezone_set('Asia/Ho_Chi_Minh');

function check_sesion(){
    if(!isset($_SESSION['user'])){
        header("location: index.php");
        exit();
    }
}

function check_login()
{
    $con = open();
    $selec_code = " SELECT * FROM `users` WHERE email = '" . $_SESSION['user'] . "' && code ='".md5(session_id())."' LIMIT 0,1 ; ";
    $query = select($con, $selec_code);
    close($con);
    if($query==null) {
        header("Location:index.php");
        exit();
    }

    return $query;
}

function check_role($role, $user, $die = false){
    $user_role = $user[0]['role'];
    $point = array("root" => 4, "admin" => 3, "manager" => 2, "user" => 1);
    $role_name = array("root", "admin", "manager", "user");
    if(!in_array($user_role,$role_name) || !in_array($role, $role_name)){
        if ($die) die();
        else {
            header("Location:index.php");
            exit();
        }
    }
    if($point[$user_role]< $point[$role]){
        if ($die) die();
        else {
            header("Location:index.php");
            exit();
        }
    }
}

function check_all($role, $die = false){
    check_sesion();
    check_role($role, check_login(), $die);
}


function open() {
    if ($_SERVER['HTTP_HOST'] == "ums2.amzgroup.io") $conn = new mysqli("localhost", "ums2amzgroupio_user", "eJ3NXe-Hjb{2", "ums2amzgroupio_data");
    else if ($_SERVER['HTTP_HOST'] == "ums.amzgroup.io") $conn = new mysqli("localhost", "umsamzgroupio", "it4fEPn#zptg", "umsamzgroupio_ums_amz_groupvn");
    if ($_SERVER['HTTP_HOST'] == "ums3.amzgroup.io") $conn = new mysqli("localhost", "ums2amzgroupio_user", "eJ3NXe-Hjb{2", "ums2amzgroupio_data");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $conn->set_charset("utf8mb4");
    return $conn;
}

function close($conn) {
    $conn->close();
}

function query($conn, $sql) {
    $conn->query($sql);
}

function select($conn, $sql) {
    $conn->query($sql);
    $result = $conn->query($sql);
    $table = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $table[] = $row;
        }
    }
    return $table;
}

function not_allow($user, $job, $project) {


    $worker = explode(",",rtrim($job['worker'], ','));
    $supporter = explode(",",rtrim($job['supporter'], ','));
    $supervisor = explode(",",rtrim($job['supervisor'], ','));

    if( $user[0]['role'] == 'root' ) return false;
    if( $user[0]['role'] == 'admin' ) return false;
    if ($project[0]['owner'] == $user[0]['id']) return false;
    if(in_array($user[0]['id'],$worker )) return false;
    if(in_array($user[0]['id'],$supporter )) return false;
    if(in_array($user[0]['id'],$supervisor )) return false;
    return true;
}

function select_cost($user_id){
    $conn = open();
    $select_cost_from = " SELECT SUM(cost) AS total_cost FROM `Diary` WHERE `from` = $user_id ";
    $cost_out = select($conn, $select_cost_from)[0]['total_cost'];
    $select_cost_to = " SELECT SUM(cost) AS total_cost FROM `Diary` WHERE `to` = $user_id ";
    $cost_in = select($conn, $select_cost_to)[0]['total_cost'];
    $total_cost = " SELECT * FROM `wallet` WHERE `id`=$user_id; ";
    $balance = select($conn, $total_cost)[0]['init_balance'];
    $profit = $cost_in-$cost_out;
    $remainder_total = $balance + $profit;
    close($conn);
    return [$cost_in, $cost_out, $profit,$balance, $remainder_total];
}

function gantt_color($start_date, $end_date, $day, $is_done, $Completion_Time){
    $color = "";
    $date_now = date("Y-m-d");
    if($day>$date_now){
        $color="bd-gray-400";
    }
    if($start_date<=$day && $end_date>=$day){
        $color = "bg-secondary";
    }
    if($start_date<=$day && $end_date>=$day && $is_done==1 && $day<=$Completion_Time ){
        $color = "bg-success";
    }elseif ($day>=$end_date && $Completion_Time>=$day && $is_done==1  ){
        $color = "bg-danger";
    }
    echo $color;
}

function SumCostUser($id_wallet, $job_id, $role) {
    if ($role == 'admin' || $role == 'root'){
        $select_cost = " SELECT SUM(cost) AS total_cost FROM `Diary` WHERE job_id = $job_id; ";
    } else{
        $select_cost = " SELECT SUM(cost) AS total_cost FROM `Diary` WHERE job_id = $job_id AND (`from` = $id_wallet OR `to` = $id_wallet); ";
    }
    $conn = open();
    $data = select($conn, $select_cost)[0]['total_cost'];
    if(!$data){
        $data = 0;
    }
    close($conn);
    return $data;
}

?>