<?php

if ( isset($_POST['email']) ) {
    $data = array(
        'secret' => "0xd3b27800Ff05e10698B1a09cd126E20FdAE2efC4",
        'response' => $_POST['h-captcha-response']
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $responseData = json_decode($response);
    if($responseData->success) {
        //Ok 
    } else {
        $_SESSION["error"] ='Invalid captcha';
        header('Location:login.php');
        exit();
    }
}
?>
