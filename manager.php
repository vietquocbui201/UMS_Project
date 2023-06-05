<?php
include "action_processing/init.php";
check_sesion();
check_login();
$_SESSION['check'] = $_GET['check_search'];
if (isset($_POST["start_date_search"])) {
    $_SESSION['search']['start_date'] = $_POST['start_date_search'];
    $_SESSION['search']['end_date'] = $_POST['end_date_search'];
    $_SESSION['search']['status'] = $_POST['status_search'];
    $_SESSION['search']['option1'] = $_POST['option1_search'];
    $_SESSION['search']['option2'] = $_POST['option2_search'];
    $_SESSION['search']['option3'] = $_POST['option3_search'];
    $_SESSION['search']['option4'] = $_POST['option4_search'];
    $_SESSION['search']['option5'] = $_POST['option5_search'];
    $_SESSION['search']['user'] = $_POST['list_user'];
    $_SESSION['search']['group'] = $_POST['group_search'];
    header("Location: manager.php?project_id=" . $_GET["id"] . "&check_search=1" );
    exit();
}
if ($_SESSION['check'] == 0 ) unset($_SESSION['search']);
if (!isset($_SESSION['search'])) {
    $_SESSION['search']['start_date'] = null;
    $_SESSION['search']['end_date'] = null;
    $_SESSION['search']['status'] = null;
    $_SESSION['search']['option1'] = null;
    $_SESSION['search']['option2'] = null;
    $_SESSION['search']['option3'] = null;
    $_SESSION['search']['option4'] = null;
    $_SESSION['search']['option5'] = null;
    $_SESSION['search']['group'] = null;
    $_SESSION['search']['project'] = intval($_GET["project_id"]);
}
$conn = open();
//------------------------------------------------------------------------------
$select_user = " SELECT * FROM `users` WHERE email = '" . $_SESSION['user'] . "'; ";
$user = select($conn, $select_user);
//------------------------------------------------------------------------------
$id_user = $user[0]['id'];
$name_user = $user[0]['name'];
$role = $user[0]['role'];
if($role == 'admin' || $role == 'root' ){
    $selectproject = " SELECT * FROM `project`; ";
}else {
    $selectproject = " SELECT * FROM `project` WHERE owner = $id_user OR FIND_IN_SET('$id_user', `list_user`); ";
}
$list_project = select($conn, $selectproject);
//------------------------------------------------------------------------------
$select_wallet = " SELECT * FROM `wallet` WHERE `owner` = $id_user; ";
$wallet_id = select($conn, $select_wallet);
//------------------------------------------------------------------------------
$project=null;
if (isset($_GET["project_id"])) {
    $id_project = intval($_GET["project_id"]);
    $select_project_details = "SELECT * FROM `project` WHERE id = $id_project;  ";
    $project = select($conn, $select_project_details);
}
//-----------------------------------------------------------------------------
$list_group = " SELECT * FROM `job` WHERE type = 'group' AND `project_id` = '$id_project' ";
$group_list = select($conn, $list_group);
close($conn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="AMZ Group">
    <meta name="author" content="AMZ Group">
    <title>TH UMS | UMS Manager</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- CSS -->
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/css/adminums.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/th-ums.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/bd-bootstrap.css">
    <link rel="stylesheet" href="chat-gpt/card.css">
   
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php
    include "header-footer-manager/header-manager-list.php";
    ?>

    <?php
    include "header-footer-manager/aside.php";
    ?>
    <div class="content-wrapper bg-white main-banner-manager" id="main-content-nav">
        <section class="content">
            <div class="accordion mt-2">
                <section style="font-size: 12px!important;" id="manager_zone">
                    <div class="">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" action="manager.php?id=<?php echo $id_project; ?>"
                                          enctype="multipart/form-data">
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-1 align-self-center my-1">
                                                    <label class="ps-1">Start date</label>
                                                    <input name="start_date_search" type="date"
                                                           class="form-input-table shadow" style="font-size: 10px;"
                                                           value="<?php echo  substr($_SESSION['search']['start_date'], 0, 10) ; ?>">
                                                </div>
                                                <div class="col-lg-1 align-self-center my-1">
                                                    <label class="ps-1">End date</label>
                                                    <input name="end_date_search" type="date"
                                                           class="form-input-table shadow" style="font-size: 10px;"
                                                           value="<?php echo  substr($_SESSION['search']['end_date'], 0, 10) ; ?>">
                                                </div>
                                                <div class="col-lg-2 align-self-center" id="findusergroup">
                                                    <fieldset>
                                                        <?php
                                                        $conn = open();
                                                        $list_user_id = substr($_SESSION['search']['user'], 0, -1);
                                                        $select_user = " SELECT * FROM `users` WHERE `id` in ($list_user_id); ";
                                                        $users = select($conn, $select_user);
                                                        close($conn);
                                                        ?>
                                                        <label class="ps-1" id="list_user_avatar">User <?php
                                                            if ($users) {
                                                                for ($i = 0; $i < count($users); $i++) {
                                                                    if (!$users[$i]['avatar']) $users[$i]['avatar'] = "noavatar.png";
                                                                    echo '<span class="img-wrap" data-role='.$users[$i]['role'].' > <img data-role="'.$users[$i]['role'].'" data-id="' . $users[$i]['id'] . '" data-toggle="tooltip" title="' . $users[$i]['name'] . ' ( ' . $users[$i]['email'] . ' )" class="mr-1 rounded-circle role-'.$users[$i]['role'].'" style="width: 23px; height: 23px" src="assets/images/' . $users[$i]['avatar'] . '"> </span>';
                                                                }
                                                            }
                                                            ?> </label>
                                                        <input name="user_search" type="text" id="findusername" name="findusername"
                                                               class="form-input-table shadow" style="font-size: 10px;">
                                                        <input type="hidden" class="form-control" name="list_user"  value="<?php echo $_SESSION['search']['user'] ?>">
                                                        <div class="form-group" id="findusernametext"
                                                             style="display: none; position: absolute; z-index: 999; width: 400px">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <label class="ps-1">Group</label>
                                                        <select class="form-select-table  shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select3"
                                                                name="group_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($group_list as $row) { ?>
                                                                <option <?php echo $_SESSION['search']['group'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <?php $data_option1 = json_decode($project[0]['status'], true); ?>
                                                        <label class="ps-1">Trạng thái</label>
                                                        <select class="form-select-table  shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select3"
                                                                name="status_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($data_option1['rows'] as $row) {
                                                                ?>
                                                                <option <?php echo $_SESSION['search']['status'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <?php $data_option1 = json_decode($project[0]['option1'], true); ?>
                                                        <label class="ps-1"><?php echo $data_option1['caption'] ?></label>
                                                        <select class="form-select-table shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select4"
                                                                name="option1_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($data_option1['rows'] as $row) {
                                                                ?>
                                                                <option <?php echo $_SESSION['search']['option1'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <?php $data_option1 = json_decode($project[0]['option2'], true); ?>
                                                        <label class="ps-1"><?php echo $data_option1['caption'] ?></label>
                                                        <select class="form-select-table shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select5"
                                                                name="option2_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($data_option1['rows'] as $row) {
                                                                ?>
                                                                <option <?php echo $_SESSION['search']['option2'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <?php $data_option1 = json_decode($project[0]['option3'], true); ?>
                                                        <label class="ps-1"><?php echo $data_option1['caption'] ?></label>
                                                        <select class="form-select-table shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select5"
                                                                name="option3_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($data_option1['rows'] as $row) {
                                                                ?>
                                                                <option <?php echo $_SESSION['search']['option3'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <?php $data_option1 = json_decode($project[0]['option4'], true); ?>
                                                        <label class="ps-1"><?php echo $data_option1['caption'] ?></label>
                                                        <select class="form-select-table shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select5"
                                                                name="option4_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($data_option1['rows'] as $row) {
                                                                ?>
                                                                <option <?php echo $_SESSION['search']['option4'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <?php $data_option1 = json_decode($project[0]['option5'], true); ?>
                                                        <label class="ps-1"><?php echo $data_option1['caption'] ?></label>
                                                        <select class="form-select-table shadow my-1"
                                                                style="font-size: 10px;" aria-labelledby="select5"
                                                                name="option5_search">
                                                            <option selected value="0">All</option>
                                                            <?php foreach ($data_option1['rows'] as $row) {
                                                                ?>
                                                                <option <?php echo $_SESSION['search']['option5'] == $row['id'] ? "selected" : " "; ?>
                                                                        value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-1 align-self-center">
                                                    <fieldset>
                                                        <button data-project-id="<?php echo $id_project; ?>"
                                                                type="submit"
                                                                class=" btn text-white btn-warning shadow w-100"
                                                                id="search-button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid pt-3">
                            <div class="row mb-2 ">
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button data-table="project-table" type="button"
                                            class="btn text-white btn-warning shadow w-100 change-button">Project
                                    </button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button data-table="job-table" type="button"
                                            class="btn text-white btn-warning shadow w-100 change-button">Work
                                    </button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button data-table="rate-table" type="button"
                                            class="btn text-white btn-warning shadow w-100 change-button">Rate
                                    </button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button data-table="gantt-table" type="button"
                                            class="btn text-white btn-warning shadow w-100 change-button">Gantt
                                    </button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button type="button" class="btn text-white btn-dark shadow w-100 fit-content">Fit
                                        content
                                    </button>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex">
                                    <div class="d-inline-block" id="">
                                        <?php
                                        include "header-footer-manager/project-table.php"
                                        ?>
                                    </div>
                                    <div class="d-inline-block mouse-scroll" style="overflow-x: auto">
                                        <div id="box" class="row" style="width: 8000px">
                                            <div class="d-flex">
                                                <div>
                                                    <?php
                                                    include "header-footer-manager/job-table.php"
                                                    ?>
                                                </div>
                                                <div>
                                                    <?php
                                                    include "header-footer-manager/rate-table.php"
                                                    ?>
                                                </div>
                                                <div>
                                                    <?php
                                                    include "header-footer-manager/gantt-table.php"
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
    <div class="col col-md-4 col-lg-4 d-none" id="card-profile" style=" position: fixed; top:50px; left: 50px ; z-index: 9999999;">
        <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4">
                <div class="d-flex text-black">
                    <div class="flex-shrink-0">
                        <img src="  "
                             alt="Generic placeholder image" class="img-fluid"
                             style="max-width: 100px; max-height: 100px; border-radius: 10px;">
                        <p id="role-name" style="color: #2b2a2a; text-align: center;" class="mb-5">Team code</p>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 id="name-profile" class="mb-1">Bui Quoc Viet</h5>
                        <p style="color: #2b2a2a;">....</p>
                        <p style="color: #2b2a2a;" class="mb-5">Team: ...</p>
                        <div class="d-flex pt-1">
                            <button type="button" class="btn btn-primary mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-telegram" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-primary mx-1">
                                Zalo
                            </button>
                            <button type="button" class="btn btn-primary mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-primary mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-primary mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-chat-dots" viewBox="0 0 16 16">
                                    <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                                    <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "header-footer-manager/larger-right-offcanvas.php";
    ?>

    <?php
    include "header-footer-manager/footer-manager-list.php";
    ?>

    <?php include 'chat-gpt/chat_ums.php';?>
</div>
<div class="alert alert-success" id="myAlertsuccess"
     style="position: fixed;z-index: 999999;top:20px; right: 20px; display: none"></div>
<div class="alert alert-danger" id="myAlertdanger"
     style="position: fixed;z-index: 999999;top:20px; right: 20px; display: none"></div>

<form action="#" method="POST" class="d-none">
    <input type="file" class="form-control" name="img-name[]" multiple id="img-name">
</form>
<form action="#" method="POST" class="d-none">
    <input type="file" class="form-control" name="file-name[]" multiple id="file-name">
</form>
<!-- ./wrapper -->

<!--  Jquery-->
<script src="js.js"></script>
<script src="assets/js/ums.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<script src="assets/js/home_action.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
<script src="chat-gpt/js.js"></script>
<!--  End Jquery-->

</body>
</html>
