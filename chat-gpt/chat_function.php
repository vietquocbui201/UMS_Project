<?php
include "../action_processing/init.php";
check_sesion();
check_login();
$action=$_GET['action'];


$con = open();
$selec_user = " SELECT * FROM `users` WHERE email = '" . $_SESSION['user'] . "' && code ='".md5(session_id())."' LIMIT 0,1 ; ";
$id_user = mysqli_fetch_array($con->query($selec_user))['id'];
close($con);

switch($action){

    case 'Chat_GPT':
        Chat_GPT($_REQUEST,$id_user);
        break;
 
}


function Chat_GPT($request,$id_user){
    
    $con=open();
    $sql_api_key="SELECT * FROM `api_key` WHERE `live`=1 ORDER BY `accsess` LIMIT 0,1 ;";
    $data_api=mysqli_fetch_array($con->query($sql_api_key));
    $id=$data_api['id'];
    $API_KEY=$data_api['key'];
    $accsess=$data_api['accsess'];
    $error=$data_api['error'];
    $content_user=$request['message'];
    $con->query("INSERT INTO `chat_gpt`(`user_id`, `role`, `message`) VALUES ('$id_user','user','$content_user')");
    $messages=json_decode($request['data']);
    
    $url = 'https://api.openai.com/v1/chat/completions';
    $data=([
        "model"=> "gpt-3.5-turbo",
        "messages"=>$messages
    ]);
    
    $headers = array(
        'Authorization: Bearer '.$API_KEY,
        'Content-Type: application/json'
    );
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_TIMEOUT,1000*60);
    
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
    
    $data=json_decode($response);
    if(isset($data->choices[0]->message->content)){

        $accsess+=1;
        $update="UPDATE `api_key` SET `accsess`='$accsess' WHERE `id`='$id' ;";
        $mes=$con->real_escape_string($data->choices[0]->message->content);
        $role=$con->real_escape_string($data->choices[0]->message->role);
        $con->query("INSERT INTO `chat_gpt`(`user_id`, `role`, `message`) VALUES ('$id_user','$role','$mes')");

    }else{
        $error+=1;
        $update="UPDATE `api_key` SET `error`='$error' WHERE `id`='$id' ;";
    }
    $con->query($update);
    close($con);
}



?>
