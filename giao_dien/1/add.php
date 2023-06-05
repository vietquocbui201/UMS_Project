<?php
include "action_processing/init.php";
$id=intval($_GET['id']);
check_all("manager");
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Audiowide:400,700" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/adminlte.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/listing.css">
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
                        <h3 class="text-white">UMS ADD AND EDIT PROJECT</h3>
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
                                <div class="col-6 col-sm-auto d-flex align-items-center pr-0 m-3 my-0">
                                    <h4 class="fs-0 mb-0 text-nowrap py-2 py-xl-0" style="font-weight: 600;color: #5e5e5e;font-family: 'Audiowide'">
                                        UMS <span style="color: #e8a000">ADD</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div>
                                <div>
                                    <div class="p-0">
                                        <form method="POST" action="action_processing/action.php?function_name=SubmitFormProject&id_user=<?php echo $id ?>" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Project Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter project" name="Project_Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control" name="Start_Date" value="<?php echo date("Y-m-d"); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control" name="End_Date" value="<?php echo date("Y-m-d"); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>User</label>
                                                            <fieldset>
                                                                <select class="form-control form-select" name="list_user">
                                                                    <option selected>---</option>
                                                                    <option value="Huân">Huân</option>
                                                                    <option value="Hà">Hà</option>
                                                                    <option value="Diệp">Điêp</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <!--div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <label>Work</label>
                                                            <fieldset>
                                                                <select class="form-control form-select" name="Work_Type">
                                                                    <option selected>---</option>
                                                                    <option value="Data analysis">Data analysis</option>
                                                                    <option value="Keyword new">Keyword new</option>
                                                                    <option value="Audit">Audit</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <label>Work Group</label>
                                                            <input type="text" class="form-control" name="Work_Group">
                                                        </div>
                                                    </div-->
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="" value="" placeholder="Find user">
                                                        </div>
                                                    </div>
                                                    <!--div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="" value="" placeholder="Add new work group">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="" placeholder="Add new work">
                                                        </div>
                                                    </div-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Job Content</label>
                                                            <input type="text" class="form-control" name="Job_Content">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Explain</label>
                                                            <input type="text" class="form-control" name="Job_Explain">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Request</label>
                                                            <input type="text" class="form-control" name="Job_Request">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Target</label>
                                                            <input type="text" class="form-control" name="Job_Target">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-warning text-white fw-bold" style="font-size: 14px">Submit</button>
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


<!-- Footer-->
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
<script src="assets/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

<!-- End Scripts -->
</body>
</html>