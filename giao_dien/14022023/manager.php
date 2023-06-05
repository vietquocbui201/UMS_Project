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
    <link rel="stylesheet" href="assets/css/adminums.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/th-ums.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <section style="font-size: 12px!important;">
                    <div class="">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form>
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-2 align-self-center my-1">
                                                    <label id="date1" class="d-none"></label>
                                                    <input type="date" class="form-control shadow" aria-labelledby="date1">
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <fieldset>
                                                        <label id="select1" class="d-none"></label>
                                                        <select class="form-select shadow my-1" aria-labelledby="select1">
                                                            <option selected>Project</option>
                                                            <option>Homechit</option>
                                                            <option>Link Review</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <fieldset>
                                                        <label id="select2" class="d-none"></label>
                                                        <select class="form-select shadow my-1" aria-labelledby="select2">
                                                            <option selected>Communication</option>
                                                            <option>Facebook</option>
                                                            <option>Tiktok</option>
                                                            <option>Adw</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <fieldset>
                                                        <label id="select3" class="d-none"></label>
                                                        <select class="form-select shadow my-1" aria-labelledby="select3">
                                                            <option selected>Work</option>
                                                            <option>Keyword new</option>
                                                            <option>Audit</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <fieldset>
                                                        <label id="select4" class="d-none"></label>
                                                        <select class="form-select shadow my-1" aria-labelledby="select4">
                                                            <option selected>Tools</option>
                                                            <option>Keyword tools</option>
                                                            <option>Facebook</option>
                                                            <option>TH.KEY</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <fieldset>
                                                        <label id="select5" class="d-none"></label>
                                                        <select class="form-select shadow my-1" aria-labelledby="select5">
                                                            <option selected>Staff</option>
                                                            <option>Huân</option>
                                                            <option>Hà</option>
                                                            <option>Điêp</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row d-flex justify-content-end">
                                                <div class="col-lg-2 my-1 ">
                                                    <fieldset>
                                                        <button type="button" class="btn text-white btn-warning shadow w-100"><i class="fa fa-search"></i> Search</button>
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
                                    <button type="button" class="btn text-white btn-warning shadow w-100"> Content</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button type="button" class="btn text-white btn-warning shadow w-100"> Work</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button type="button" class="btn text-white btn-secondary shadow w-100"> Rate</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2 px-1">
                                    <button type="button" class="btn text-white btn-secondary shadow w-100"> Gantt</button>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex">
                                    <div class="d-inline-block">
                                        <?php
                                        include "header-footer-manager/project-table.php"
                                        ?>
                                    </div>
                                    <div class="d-inline-block" style="overflow-x: auto">
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

    <?php
    include "header-footer-manager/larger-right-offcanvas.php";
    ?>

    <?php
    include "header-footer-manager/footer-manager-list.php";
    ?>

</div>
<!-- ./wrapper -->

<!--  Jquery-->
<script src="assets/js/ums.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<!--  End Jquery-->

</body>
</html>
