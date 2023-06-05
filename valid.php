<?php
if(!isset($_POST['email'])){
    header("Location: index.php");
    exit();
}
include 'action_processing/init.php';
$con= open();
include 'sendmail.php';
include 'functions/check_captcha.php';
$email =$_POST['email']; 
$code = md5(session_id());;
$updated = date('Y-m-d H:i:s', (time() + 900));
$select_user = "select * from users where email='$email'";
$query = mysqli_query($con, $select_user);
$check_user = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);
// if($row['banned']!=0) {
//     $_SESSION["error"] ='The account cannot be logged in, please contact admin';
//     header("Location: " . $_SERVER["HTTP_REFERER"]);
//     exit();
// }
if ($check_user == 1) {
    $update_code = "UPDATE `users` SET `code`='$code',`updated`='$updated' WHERE `email`='$email'";
    $query = mysqli_query($con, $update_code);
   
} else {
    $_SESSION["error"] = 'Email does not exist';
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TH UMS - Index UMS</title>
    <!--Icon-->
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="apple-touch-icon" href="#">
    <!-- Font APIs & Font Awesome-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/listing.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>
<body>
    <!-- Header-->
    <?php
    include "header-footer/header.php";
    ?>
    <section class="min-vh-100 border-0">
        <div class="main-banner border-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-text header-text">
                            <h6>We are here to serve you</h6>
                            <h2>UMS Valid</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 px-3">
                        <div class=" row gx-5 justify-content-center">
                            <div class="col-lg-6 col-xl-4 card py-5 bg-white bg-opacity-25">
                                <form class="gx-2 gy-2 align-items-center" method="POST" action="confirm.php?email=<?php echo $email?>">
                                    <div class="form-floating mb-3">
                                    <input class="form-control" type="text" placeholder="Enter code ..." name="code" required/>
                                        <label for="code">Enter code</label>
                                    </div>
                                    <div class="d-grid d-flex justify-content-center">
                                        <div class="main-white-button text-dark border-0"><button type="submit" class="btn" style="font-weight: 500">Confirm</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 mt-3 row-cols-2 row-cols-lg-4 py-5">
                    <div class="col text-center">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fa-regular fa-message gentle-hover-shake"></i></div>
                        <div class="h5 text-white">Chat with us</div>
                        <p class="text-white mb-0">Please use Zalo to chat with us.</p>
                    </div>
                    <div class="col text-center">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fa-regular fa-circle-question gentle-hover-shake"></i></div>
                        <div class="h5 text-white">Ask the community</div>
                        <p class="text-white mb-0">Have any questions just ask us.</p>
                    </div>
                    <div class="col text-center">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fa-solid fa-headset gentle-hover-shake"></i></div>
                        <div class="h5 text-white">Support center</div>
                        <p class="text-white mb-0">Code Team TH Always ready to serve you</p>
                    </div>
                    <div class="col text-center">
                        <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="fa-solid fa-phone gentle-hover-shake"></i></div>
                        <div class="h5 text-white">Call us</div>
                        <p class="text-white mb-0">Call us during normal business hours at (393) 946-***.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "header-footer/footer.php";
    ?>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesLoaded.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Scripts -->
</body>
</html>
<?php
send_mail($email);
?>

