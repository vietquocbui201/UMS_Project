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
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminums.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Audiowide:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/th-ums.css">
    <link rel="stylesheet" href="assets/css/animated.css">
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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white main-banner-manager" id="main-content-nav">
        <!-- Main content -->
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
                                                        <button type="button" class="btn text-white btn-ums shadow w-100"><i class="fa fa-search"></i> Search</button>
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
                                <div class="col-lg-2 col-md-2 mb-2 pr-0 ">
                                    <!-- small box -->
                                    <button type="button" class="btn text-white btn-ums shadow w-100" style="border-bottom-right-radius: 0;border-top-right-radius: 0"> Content</button>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-md-2 mb-2 px-0">
                                    <!-- small box -->
                                    <button type="button" class="btn text-white btn-ums shadow w-100" style="border-radius: 0"> Work</button>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-md-2 mb-2 px-0">
                                    <!-- small box -->
                                    <button type="button" class="btn text-white btn-grey shadow w-100" style="border-radius: 0"> Rate</button>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-md-2 mb-2 px-0">
                                    <!-- small box -->
                                    <button type="button" class="btn text-white btn-grey shadow w-100" style="border-bottom-left-radius: 0;border-top-left-radius: 0"> Gantt</button>
                                </div>
                                <!-- ./col -->
                            </div>
                            <div style="overflow-x: auto">
                                <div class="row" style="min-width: 3840px">
                                    <div class="col-lg-12 w-25 pr-1 pl-3">
                                        <!-- Box Comment -->
                                        <div class="card card-widget">
                                            <div class="card-header bg-grey">
                                                <div class="user-block mt-1">
                                                    <span class="username ml-0 text-white"><span>Nội Dung</span></span>
                                                </div>
                                                <div class="card-tools mt-1 mr-1">
                                                    <div class="form-check" style="font-size: 14px">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label text-white">Show All</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive table-bordered p-0">
                                                    <table class="table mb-0">
                                                        <thead>
                                                        <tr class="bg-white">
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Nội dung</th>
                                                            <th scope="col">Worker</th>
                                                            <th scope="col">Supporter</th>
                                                            <th scope="col">Supervisor</th>
                                                            <th scope="col">Start Date</th>
                                                            <th scope="col">Duration</th>
                                                            <th scope="col">Work ID</th>
                                                            <th scope="col">Priority</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Lấy dữ liệu đầu vào</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.1</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Nhận các mô hình máy học</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.2</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Phân tích dữ liệu</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.3</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Chọn mô hình tốt nhất</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.4</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Nhận bộ dữ liệu tổng</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.5</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Phân tích dữ liệu tổng với mô hình được chọn</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.6</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Báo cáo kết quả</td>
                                                            <td>User 1</td>
                                                            <td>User 2</td>
                                                            <td>User 3</td>
                                                            <td>2022-11-09</td>
                                                            <td>4H</td>
                                                            <td>PTDL20230227.6</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row mx-1 my-2 align-items-center justify-content-center justify-content-md-between">
                                                    <div class="col-auto mb-2 mb-sm-0">
                                                        <div class="col-auto">
                                                            <div class=" rounded-pill">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;border-top-left-radius: 10px;border-bottom-left-radius: 10px;font-size: 10px;font-weight: bold"> < </a>
                                                                    </li>
                                                                    <li class=" page-item ">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 1 </a>
                                                                    </li>
                                                                    <li class="page-item  border-0">
                                                                        <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0" style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>
                                                                    </li>
                                                                    <li class=" page-item ">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 4 </a>
                                                                    </li>
                                                                    <li class=" page-item ">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 5 </a>
                                                                    </li>
                                                                    <li class=" page-item ">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 6 </a>
                                                                    </li>
                                                                    <li class=" page-item ">
                                                                        <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0" style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>
                                                                    </li>
                                                                    <li class=" page-item ">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 23 </a>
                                                                    </li>
                                                                    <li class=" page-item next">
                                                                        <a href="#" class="page-link font-weight-bold" style="color: #e8a000;border-top-right-radius: 10px;border-bottom-right-radius: 10px;font-size: 10px; font-weight: bold"> > </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-sm-0">
                                                        <form class="row">
                                                            <div class="col-auto mt-2">
                                                                Result per page
                                                            </div>
                                                            <div class="col-auto form-group">
                                                                <select class="form-select" style="width: 70px;border-radius: 10px">
                                                                    <option selected>10</option>
                                                                    <option value="1">20</option>
                                                                    <option value="2">30</option>
                                                                    <option value="3">40</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 w-25 px-1" >
                                        <!-- Box Comment -->
                                        <div class="card card-widget">
                                            <div class="card-header bg-grey">
                                                <div class="user-block mt-1">
                                                    <span class="username ml-0 text-white"><span>Công Việc</span></span>
                                                </div>
                                                <div class="card-tools mt-1 mr-1">
                                                    <div class="form-check" style="font-size: 14px">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label text-white">Show All</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div>
                                                    <div>
                                                        <div class="table-responsive table-bordered p-0">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr class="bg-white">
                                                                    <th>Báo cáo</th>
                                                                    <th>Link Báo Cáo</th>
                                                                    <th>Ghi Chú</th>
                                                                    <th>Option 1</th>
                                                                    <th>Option 2</th>
                                                                    <th>Option 3</th>
                                                                    <th>Option 4</th>
                                                                    <th>Chi Phí</th>
                                                                    <th>Trạng Thái</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lấy dữ liệu đầu vào</td>
                                                                    <td>https://work.com.vn</td>
                                                                    <td>Cần làm sớm</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>6$</td>
                                                                    <td>Đang làm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row mx-1 my-2 align-items-center justify-content-center justify-content-md-between">
                                                            <div class="col-auto mb-2 mb-sm-0">
                                                                <div class="col-auto">
                                                                    <div class=" rounded-pill">
                                                                        <ul class="pagination">
                                                                            <li class="page-item">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;border-top-left-radius: 10px;border-bottom-left-radius: 10px;font-size: 10px;font-weight: bold"> < </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 1 </a>
                                                                            </li>
                                                                            <li class="page-item  border-0">
                                                                                <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0" style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 4 </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 5 </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 6 </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0" style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 23 </a>
                                                                            </li>
                                                                            <li class=" page-item next">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;border-top-right-radius: 10px;border-bottom-right-radius: 10px;font-size: 10px; font-weight: bold"> > </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-sm-0">
                                                                <form class="row">
                                                                    <div class="col-auto mt-2">
                                                                        Result per page
                                                                    </div>
                                                                    <div class="col-auto form-group">
                                                                        <select class="form-select" style="width: 70px;border-radius: 10px">
                                                                            <option selected>10</option>
                                                                            <option value="1">20</option>
                                                                            <option value="2">30</option>
                                                                            <option value="3">40</option>
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 w-25 px-1" >
                                        <!-- Box Comment -->
                                        <div class="card card-widget">
                                            <div class="card-header bg-grey">
                                                <div class="user-block mt-1">
                                                    <span class="username ml-0 text-white"><span>Đánh Giá</span></span>
                                                </div>
                                                <div class="card-tools mt-1 mr-1">
                                                    <div class="form-check" style="font-size: 14px">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label text-white">Show All</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div>
                                                        <div class="table-responsive table-bordered p-0">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr class="bg-white">
                                                                    <th>Đánh giá</th>
                                                                    <th>Ghi chú</th>
                                                                    <th>Bài Học </th>
                                                                    <th>Khác</th>
                                                                    <th>Option 1</th>
                                                                    <th>Option 2</th>
                                                                    <th>Option 3</th>
                                                                    <th>Option 4</th>
                                                                    <th>Option 5</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit amet</td>
                                                                    <td>Lorem ipsum dolor sit</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                    <td>Option</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox">
                                                                            <label class="form-check-label">Hide</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row mx-1 my-2 align-items-center justify-content-center justify-content-md-between">
                                                            <div class="col-auto mb-2 mb-sm-0">
                                                                <div class="col-auto">
                                                                    <div class=" rounded-pill">
                                                                        <ul class="pagination">
                                                                            <li class="page-item">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;border-top-left-radius: 10px;border-bottom-left-radius: 10px;font-size: 10px;font-weight: bold"> < </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 1 </a>
                                                                            </li>
                                                                            <li class="page-item  border-0">
                                                                                <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0" style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 4 </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 5 </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 6 </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0" style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>
                                                                            </li>
                                                                            <li class=" page-item ">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;font-size: 10px;font-weight: bold"> 23 </a>
                                                                            </li>
                                                                            <li class=" page-item next">
                                                                                <a href="#" class="page-link font-weight-bold" style="color: #e8a000;border-top-right-radius: 10px;border-bottom-right-radius: 10px;font-size: 10px; font-weight: bold"> > </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto mb-2 mb-sm-0">
                                                                <form class="row">
                                                                    <div class="col-auto mt-2">
                                                                        Result per page
                                                                    </div>
                                                                    <div class="col-auto form-group">
                                                                        <select class="form-select" style="width: 70px;border-radius: 10px">
                                                                            <option selected>10</option>
                                                                            <option value="1">20</option>
                                                                            <option value="2">30</option>
                                                                            <option value="3">40</option>
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 w-25 px-1">
                                        <!-- Box Comment -->
                                        <div class="card card-widget">
                                            <div class="card-header bg-grey">
                                                <div class="user-block mt-1">
                                                    <span class="username ml-0 text-white"><span>GANTT</span></span>
                                                </div>
                                                <div class="card-tools mt-1 mr-1">
                                                    <div class="form-check" style="font-size: 14px">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label text-white">Show All</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <table class="table table-bordered table-responsive">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col" colspan="31" class="text-center">Tháng 3</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col" colspan="7" class="text-center">Week 1</th>
                                                        <th scope="col" colspan="7" class="text-center">Week 2</th>
                                                        <th scope="col" colspan="7" class="text-center">Week 3</th>
                                                        <th scope="col" colspan="7" class="text-center">Week 4</th>
                                                        <th scope="col" colspan="3" class="text-center">Week 5</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="min-width: 150px"></th>
                                                        <th scope="col" class="mw-30 text-center">1</th>
                                                        <th scope="col" class="mw-30 text-center">2</th>
                                                        <th scope="col" class="mw-30 text-center">3</th>
                                                        <th scope="col" class="mw-30 text-center">4</th>
                                                        <th scope="col" class="mw-30 text-center">5</th>
                                                        <th scope="col" class="mw-30 text-center">6</th>
                                                        <th scope="col" class="mw-30 text-center">7</th>
                                                        <th scope="col" class="mw-30 text-center">8</th>
                                                        <th scope="col" class="mw-30 text-center">9</th>
                                                        <th scope="col" class="mw-30 text-center">10</th>
                                                        <th scope="col" class="mw-30 text-center">11</th>
                                                        <th scope="col" class="mw-30 text-center">12</th>
                                                        <th scope="col" class="mw-30 text-center">13</th>
                                                        <th scope="col" class="mw-30 text-center">14</th>
                                                        <th scope="col" class="mw-30 text-center">15</th>
                                                        <th scope="col" class="mw-30 text-center">16</th>
                                                        <th scope="col" class="mw-30 text-center">17</th>
                                                        <th scope="col" class="mw-30 text-center">18</th>
                                                        <th scope="col" class="mw-30 text-center">19</th>
                                                        <th scope="col" class="mw-30 text-center">20</th>
                                                        <th scope="col" class="mw-30 text-center">21</th>
                                                        <th scope="col" class="mw-30 text-center">22</th>
                                                        <th scope="col" class="mw-30 text-center">23</th>
                                                        <th scope="col" class="mw-30 text-center">24</th>
                                                        <th scope="col" class="mw-30 text-center">25</th>
                                                        <th scope="col" class="mw-30 text-center">26</th>
                                                        <th scope="col" class="mw-30 text-center">27</th>
                                                        <th scope="col" class="mw-30 text-center">28</th>
                                                        <th scope="col" class="mw-30 text-center">29</th>
                                                        <th scope="col" class="mw-30 text-center">30</th>
                                                        <th scope="col" class="mw-30 text-center">31</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="min-width: 150px"></th>
                                                        <th scope="col" class="mw-30 text-center bg-white">M</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">T</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">W</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">R</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">F</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">M</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">T</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">W</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">R</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">F</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">M</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">T</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">W</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">R</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">F</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">M</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">T</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">W</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">R</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">F</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-secondary">S</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">M</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">T</th>
                                                        <th scope="col" class="mw-30 text-center bg-white">W</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Lấy dữ liệu đầu vào</td>
                                                        <td class="bg-warning"></td>
                                                        <td class="bg-warning"></td>
                                                        <td class="bg-warning"></td>
                                                        <td class="bg-warning"></td>
                                                        <td class="bg-warning"></td>
                                                        <td class="bg-warning"></td>
                                                        <td class="bg-warning"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lấy dữ liệu đầu vào</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="bg-blue"></td>
                                                        <td class="bg-blue"></td>
                                                        <td class="bg-blue"></td>
                                                        <td class="bg-blue"></td>
                                                        <td class="bg-blue"></td>
                                                        <td class="bg-blue"></td>
                                                        <td class="bg-blue"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lấy dữ liệu đầu vào</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="bg-green"></td>
                                                        <td class="bg-green"></td>
                                                        <td class="bg-green"></td>
                                                        <td class="bg-green"></td>
                                                        <td class="bg-green"></td>
                                                        <td class="bg-green"></td>
                                                        <td class="bg-green"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer">

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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include "header-footer-manager/larger-right-offcanvas.php";
    ?>

    <?php
    include "header-footer-manager/footer-manager-list.php";
    ?>

</div>
<!-- ./wrapper -->

<div id="export" class="d-none">

</div>




<!--  Jquery-->
<script src="assets/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<!--  End Jquery-->

</body>
</html>
