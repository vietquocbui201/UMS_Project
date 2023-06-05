<?php 
ini_set('memory_limit', '128M');
$secret="amzgroup.vn";
function OpenCon(){
    $dbhost = "127.0.0.1";
    $dbuser = "tanamzgroupvn_chat";
    $dbpass = "}?!mMxu!ZzQ,";
    $db = "tanamzgroupvn_chat";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $conn->set_charset("utf8mb4");
    return $conn;
}
function CloseCon($conn){
    $conn -> close();
}
 function query($conn,$sql){
    $conn->query($sql);
}

function select($conn,$sql){

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
?>