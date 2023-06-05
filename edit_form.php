<?php
include "action_processing/init.php";
if (!isset($_GET["id"])) die("Access denied!");
$id = intval($_GET['id']);
check_all("manager");
//--------------------------------------------------------------
$conn = open();
$get_project = " SELECT * FROM `project` WHERE id='$id'; ";
$query = mysqli_query($conn, $get_project);
$project = mysqli_fetch_array($query);
$list_user_id = substr($project['list_user'], 0, -1);
$owner = $project['owner'];
//--------------------------------------------------------------
$select_user = " SELECT * FROM `users` WHERE `id` in ($list_user_id); ";
$users = select($conn, $select_user);
//--------------------------------------------------------------
$select_work_group = " SELECT * FROM `work_group` WHERE owner ='$owner'; ";
$work_groups = select($conn, $select_work_group);
//--------------------------------------------------------------
$id_Work_Group = $project['Work_Group'];
$select_title_work_group = " SELECT * FROM `work_group` WHERE id ='$id_Work_Group'; ";
$title = select($conn, $select_title_work_group);
//-------------------------------------------------------------
$group_id = $title[0]['id'];
$select_work_type = " SELECT * FROM `work_type` WHERE group_id = '$group_id'; ";
$work_type = select($conn, $select_work_type);
//------------------------------------------------------------
$work_type_id = $project['Work_Type'];
$select_element_worktype = " SELECT * FROM `work_type` WHERE id = '$work_type_id'; ";
$element = select($conn, $select_element_worktype);

//-------------------------------------------------------------
$select_job_group = " SELECT * FROM `job` WHERE `type` = 'group' AND project_id = '$id' ORDER BY `order_by`; ";
$job_group = select($conn, $select_job_group);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TH UMS - UMS Add</title>
    <!--Icon-->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/logo.png">
    <!-- Font APIs & Font Awesome-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Audiowide:400,700" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/adminlte.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/listing.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js.js"></script>
</head>
<body>
<!-- Header-->
<?php
include "header-footer/header.php";
?>
<section style="" class="min-vh-100">
    <div class="main-banner" style="padding-top: 100px!important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 my-2">
                    <div class="top-text header-text ">
                        <h3 class="text-white">UMS EDIT PROJECT</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-3" style="font-size: 12px">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg mb-3 ">
                        <div class="card-header py-0">
                            <div class="row align-items-center justify-content-between" >
                                <div class="col-6 col-sm-6 d-flex align-items-center my-0">
                                    <h4 class="fs-0 mb-0 text-nowrap py-2 py-xl-0" style="font-weight: 600;color: #5e5e5e;font-family: 'Audiowide'">
                                        UMS <span style="color: #e8a000">EDIT</span>
                                    </h4>
                                </div>
                                <div class="col-5 col-sm-5">
                                    <a href="manager.php?project_id=<?php echo $id ?>&check_search=0" class="btn btn-warning text-white float-right fw-bold" style="font-size: 14px">Go to project</a>
                                </div>
                                <div class="col-1 col-sm-1">
                                    <div class="switch-button switch-button-sm float-right">
                                        <input data-project-id="<?php echo $project['id'] ?>" type="checkbox" name="item1" id="item1" <?php echo $project['status_project'] == 'active' ? 'checked' : ' '; ?> >
                                        <span><label for="item1"></label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div>
                                <div>
                                    <div class="p-0">
                                        <form method="POST" action="action_processing/action.php?function_name=editproject" enctype="multipart/form-data" data-project-id="<?php echo $project['id'] ?>">
                                            <div class="card-body">
                                                <div class="row compare-group">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Project Name</label>
                                                            <input type="text" class="form-control update-now" data-table="project" data-col="Name"
                                                                   placeholder="Enter project"
                                                                   value="<?php echo $project['Name'] ?>"
                                                                   name="Project_Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control update-now" data-compare="min" data-table="project" data-col="Start_Date"
                                                                   value="<?php echo $date = date("Y-m-d", strtotime($project['Start_Date'])) ?>"
                                                                   name="Start_Date">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control update-now" data-compare="max" data-table="project" data-col="End_Date"
                                                                   value="<?php echo $date = date("Y-m-d", strtotime($project['End_Date'])) ?>"
                                                                   name="End_Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group mb-0">
                                                            <label>User</label>
                                                            <input  type="hidden" class="form-control update-add-user-project" name="list_user"
                                                                   value="<?php echo $project['list_user'] ?>">
                                                            <div class="form-control" id="list_user_avatar" >
                                                                <?php
                                                                if ($users) {
                                                                    for ($i = 0; $i < count($users); $i++) {
                                                                        if (!$users[$i]['avatar']) $users[$i]['avatar'] = "noavatar.png";
                                                                        echo '<span class="img-wrap" data-role='.$users[$i]['role'].' > <img data-role="'.$users[$i]['role'].'" data-id="' . $users[$i]['id'] . '" data-toggle="tooltip" title="' . $users[$i]['name'] . ' ( ' . $users[$i]['email'] . ' )" class="mr-1 rounded-circle role-'.$users[$i]['role'].'" style="width: 30px; height: 30px" src="assets/images/' . $users[$i]['avatar'] . '"> </span>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group mb-0">
                                                            <label>Work Group</label>
                                                            <fieldset>
                                                                <select id="select_work_group"
                                                                        class="form-control form-select update-now"
                                                                        data-table="project" data-col="Work_Group"
                                                                        name="Work_Group" >
                                                                    <option selected value="0">Default</option>
                                                                    <?php
                                                                    if ($work_groups) {
                                                                        for ($i = 0; $i < count($work_groups); $i++) {
                                                                            echo '<option  value="' . $work_groups[$i]['id'] . '" ';
                                                                            echo $project['Work_Group'] == $work_groups[$i]['id'] ? "selected" : "";
                                                                            echo '>' . $work_groups[$i]['title'] . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group mb-0">
                                                            <label>Work</label>
                                                            <fieldset>
                                                                <select id="select_work_type"
                                                                        class="form-control form-select update-now"
                                                                        data-table="project" data-col="Work_Type"
                                                                        name="Work_Type">
                                                                    <option selected value="0">Default</option>
                                                                    <?php
                                                                    if ($work_type) {
                                                                        for ($i = 0; $i < count($work_type); $i++) {
                                                                            echo '<option  value="' . $work_type[$i]['id'] . '" ';
                                                                            echo $element[0]['element'] == $work_type[$i]['element'] ? "selected" : "";
                                                                            echo '>' . $work_type[$i]['element'] . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6" id="findusergroup">
                                                        <div class="form-group" style="position: relative">
                                                            <input id="findusername" type="text" class="form-control"
                                                                   name="findusername" value="" placeholder="Find user">
                                                            <div class="form-group" id="findusernametext"
                                                                 style="display: none; position: absolute; z-index: 999">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                   name="add_new_work_group"
                                                                   placeholder="Add new work group">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="new_work"
                                                                   placeholder="Add new work">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Job Content</label>
                                                            <textarea class="form-control update-now" name="Job_Content" data-table="project" data-col="Job_Content"><?php echo $project['Job_Content'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Explain</label>
                                                            <textarea class="form-control update-now" name="Job_Explain" data-table="project" data-col="Job_Explain"><?php echo $project['Job_Explain'] ?></textarea>

                                                            <input type="hidden" class="form-control"
                                                                   value="<?php echo $project['owner'] ?>" name="owner">
                                                            <input type="hidden" class="form-control"
                                                                   value="<?php echo $id ?>" name="id_project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Request</label>
                                                            <textarea type="text" class="form-control update-now" name="Job_Request" data-table="project" data-col="Job_Request"><?php echo $project['Job_Request'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Target</label>
                                                            <textarea type="text" class="form-control update-now" name="Job_Target" data-table="project" data-col="Job_Target"><?php echo $project['Job_Target'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    include("edit_job.php");
                                                ?>
                                                <div class="row" style="font-size: 14px">
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Status</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <?php $data_json = json_decode($project['status'], true);
                                                                        foreach ($data_json['rows'] as $row) {
                                                                    ?>
                                                                            <li class="nav-item border-bottom">
                                                                                <div class="nav-link pb-1">
                                                                                    <div class="row" data-id="<?php echo $row['id'] ?>" data-col="status">
                                                                                        <div class="text-dark px-0 col-8 ">
                                                                                            <input class="form-input-table text-start" value="<?php echo $row['text']; ?>">
                                                                                        </div>
                                                                                        <div class="col-4 px-0 text-end">
                                                                                            <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>
                                                                                            <button type="button" class="btn badge btn-warning remove-radio-button">-</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                    <?php } ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control input-status" style="font-size: 12px" >
                                                                                    <div class="input-group-append append-radio-button" type="button" data-max="0" data-col="status">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <?php $data_json = json_decode($project['status'], true); ?>
                                                                            <input type="hidden" class="input_caption" data-col="status" style="text-align: center" value="<?php echo $data_json['caption'] ?>">
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <?php $data_json = json_decode($project['option1'], true);  ?>
                                                            <div class="widget-user-header bg-warning">
                                                                <li class="nav-item border-bottom">
                                                                    <?php $data_json = json_decode($project['option1'], true); ?>
                                                                    <input type="text" class="form-input-table input_caption" data-col="option1" style="text-align: center" value="<?php echo $data_json['caption'] ?>">
                                                                </li>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <?php foreach ($data_json['rows'] as $row) {
                                                                        ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="row" data-id="<?php echo $row['id'] ?>" data-col="option1">
                                                                                    <div class="text-dark px-0 col-8 ">
                                                                                        <input class="form-input-table text-start" value="<?php echo $row['text']; ?>">
                                                                                    </div>
                                                                                    <div class="col-4 px-0 text-end">
                                                                                        <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>
                                                                                        <button type="button" class="btn badge btn-warning remove-radio-button">-</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>

                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control input-status" style="font-size: 12px" >
                                                                                    <div class="input-group-append append-radio-button" type="button" data-max="0" data-col="option1">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <?php $data_json = json_decode($project['option2'], true); ?>
                                                            <div class="widget-user-header bg-warning">
                                                                <li class="nav-item border-bottom">
                                                                    <?php $data_json = json_decode($project['option2'], true); ?>
                                                                    <input type="text" class="form-input-table input_caption" data-col="option2" style="text-align: center" value="<?php echo $data_json['caption'] ?>">
                                                                </li>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <?php
                                                                    foreach ($data_json['rows'] as $row) {
                                                                        ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="row" data-id="<?php echo $row['id'] ?>" data-col="option2">
                                                                                    <div class="text-dark px-0 col-8 ">
                                                                                        <input class="form-input-table text-start" value="<?php echo $row['text']; ?>">
                                                                                    </div>
                                                                                    <div class="col-4 px-0 text-end">
                                                                                        <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>
                                                                                        <button type="button" class="btn badge btn-warning remove-radio-button">-</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control input-status" style="font-size: 12px" >
                                                                                    <div class="input-group-append append-radio-button" type="button" data-max="0" data-col="option2">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <?php $data_json = json_decode($project['option3'], true); ?>
                                                            <div class="widget-user-header bg-warning">
                                                                <li class="nav-item border-bottom">
                                                                    <?php $data_json = json_decode($project['option3'], true); ?>
                                                                    <input type="text" class="form-input-table input_caption" data-col="option3" style="text-align: center" value="<?php echo $data_json['caption'] ?>">
                                                                </li>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <?php
                                                                    foreach ($data_json['rows'] as $row) {
                                                                        ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="row" data-id="<?php echo $row['id'] ?>" data-col="option3">
                                                                                    <div class="text-dark px-0 col-8 ">
                                                                                        <input class="form-input-table text-start" value="<?php echo $row['text']; ?>">
                                                                                    </div>
                                                                                    <div class="col-4 px-0 text-end">
                                                                                        <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>
                                                                                        <button type="button" class="btn badge btn-warning remove-radio-button">-</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control input-status" style="font-size: 12px" >
                                                                                    <div class="input-group-append append-radio-button" type="button" data-max="0" data-col="option3">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <?php $data_json = json_decode($project['option4'], true); ?>
                                                            <div class="widget-user-header bg-warning">
                                                                <li class="nav-item border-bottom">
                                                                    <?php $data_json = json_decode($project['option4'], true); ?>
                                                                    <input type="text" class="form-input-table input_caption" data-col="option4" style="text-align: center" value="<?php echo $data_json['caption'] ?>">
                                                                </li>                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <?php
                                                                    foreach ($data_json['rows'] as $row) {
                                                                        ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="row" data-id="<?php echo $row['id'] ?>" data-col="option4">
                                                                                    <div class="text-dark px-0 col-8 ">
                                                                                        <input class="form-input-table text-start" value="<?php echo $row['text']; ?>">
                                                                                    </div>
                                                                                    <div class="col-4 px-0 text-end">
                                                                                        <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>
                                                                                        <button type="button" class="btn badge btn-warning remove-radio-button">-</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control input-status" style="font-size: 12px" >
                                                                                    <div class="input-group-append append-radio-button" type="button" data-max="0" data-col="option4">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <?php $data_json = json_decode($project['option5'], true); ?>
                                                            <div class="widget-user-header bg-warning">
                                                                <li class="nav-item border-bottom">
                                                                    <?php $data_json = json_decode($project['option5'], true); ?>
                                                                    <input type="text" class="form-input-table input_caption" data-col="option5" style="text-align: center" value="<?php echo $data_json['caption'] ?>">
                                                                </li>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <?php foreach ($data_json['rows'] as $row) { ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="row" data-id="<?php echo $row['id'] ?>" data-col="option5">
                                                                                    <div class="text-dark px-0 col-8 ">
                                                                                        <input class="form-input-table text-start" value="<?php echo $row['text']; ?>">
                                                                                    </div>
                                                                                    <div class="col-4 px-0 text-end">
                                                                                        <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>
                                                                                        <button type="button" class="btn badge btn-warning remove-radio-button">-</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control input-status" style="font-size: 12px" >
                                                                                    <div class="input-group-append append-radio-button" type="button" data-max="0" data-col="option5">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="d-none">
                                                <button type="submit" class="btn btn-warning text-white fw-bold" style="font-size: 14px">Submit</button>
                                            </div>
                                            <div class="card-footer">
                                                <a href="manager.php?project_id=<?php echo $id ?>&check_search=0" class="btn btn-warning text-white fw-bold" style="font-size: 14px">Go to project</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="col col-md-4 col-lg-5 d-none" id="card-profile" style=" position: absolute; z-index: 999;">
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
                    <p style="color: #2b2a2a;">Coder</p>
                    <p style="color: #2b2a2a;" class="mb-5">Team code</p>
                    <div class="d-flex pt-1">
                        <button type="button" class="btn btn-primary mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-primary mx-1">
                            Zalo
                        </button>
                        <button type="button" class="btn btn-primary mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-primary mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-primary mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
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

<div class="form-group d-none" id="select-group-list"
     style=" position: absolute; z-index: 999;">
</div>
<!-- Footer-->
<?php
include "header-footer/footer.php";
?>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

<!-- End Scripts -->
</body>
</html>