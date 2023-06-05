<?php
// session_start();
// include 'init.php';
include "../action_processing/init.php";
check_sesion();
check_login();
$action=$_GET['action'];


$con = open();
$selec_user = " SELECT * FROM `users` WHERE email = '" . $_SESSION['user'] . "' && code ='".md5(session_id())."' LIMIT 0,1 ; ";
$id_user = mysqli_fetch_array($con->query($selec_user))['id'];
close($con);

switch($action){
    
    case 'AddChat':
        AddChat($_REQUEST);
        break;
    case 'Chat_GPT':
        Chat_GPT($_REQUEST,$id_user);
        break;
    case 'clear':
        clear($id_user);
        break;
    case 'get_chat':
        get_chat($id_user);
        break;
    case 'add_private':
        add_private($_REQUEST,$id_user);
        break;
    case 'change_status':
        change_status($_REQUEST,$id_user);
        break;
    case 'delete_private':
        delete_private($_REQUEST,$id_user);
        break;
    case 'filter':
        filter($_REQUEST);
        break;
}

function AddChat($request){

    $con=open();
    $session_id=session_id();
    $message=$con->real_escape_string($request['message']);
    $to=intval($request['to']);
    $form=intval($request['form']);
    $sql="INSERT INTO `chat_box`(`session_id`,`messager`,`to`, `from`) VALUES ('$session_id','$message','1','$form') ;";
    $query=$con->query($sql);
    if($query===true){
        echo 1;
        close($con);
        exit;
    }
    echo $con->error;
    close($con);
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
function clear($id_user){
    $con=open();
    $con->query("DELETE FROM `chat_gpt` WHERE `user_id`='$id_user' ;");
    close($con);
}
function get_chat($id_user){
    $con=open();
    $data_json=[];
    $sql="SELECT * FROM `chat_gpt` WHERE `user_id`='$id_user' ORDER BY id DESC LIMIT 0,20";
    $data=select($con,$sql);
    $total=mysqli_num_rows($con->query($sql));
   if($total>0){
    for($i=$total-1;$i>=0;$i--){

        $data_push=([
            'role'=>$data[$i]['role'],
            'message'=>$data[$i]['message']
       ]); 
       array_push($data_json,$data_push);
    }
   }
   
    close($con);
    echo json_encode($data_json);
}

function add_private($request,$id_user){
    $con=open();
    $content=$con->real_escape_string($request['content']);
    $con->query("INSERT INTO `private`(`content`, `user_id`) VALUES ('$content','$id_user') ;");
    echo $con->insert_id;
    close($con);
}

function change_status($request,$id_user){
    $con=open();
    $status=intval($request['status']);
    $id=$request['id'];
    if($status==0){
        $status=1;
    }else{
        $status=0;
    }
    $con->query("UPDATE `private` SET `status`='$status' WHERE `user_id`='$id_user' AND id='$id' ;");
    close($con);
    echo $status;
}


function delete_private($request,$id_user){

    $con=open();
    $id=$request['id'];
    $query=$con->query("DELETE FROM `private` WHERE `id`='$id' AND `user_id`='$id_user'");
    close($con);
    if($query===true) echo 1;
}


function filter($request){

    $con=open();
    $key=$con->real_escape_string($request['key']);
    if($key!=''){
        $sql="SELECT * FROM `private` WHERE `status`=1 AND `content` LIKE '%$key%' LIMIT 0,10;";
    }else{
        $sql="SELECT * FROM `private` WHERE `status`=1 ;";
    }
    $query=$con->query($sql);
    close($con);
    if(mysqli_num_rows($query)>0){
        $data=[];
        while($rows=mysqli_fetch_array($query)){
            $data_push=([
                "id"=>$rows['id'],
                "content"=>$rows['content'],
                "user_id"=>$rows['user_id'],
            ]);

            array_push($data,$data_push);
        }
        echo json_encode($data);
        exit;
    }
    echo 0;

}
?>
