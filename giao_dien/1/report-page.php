<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TH UMS - UMS Report</title>
    <!--Icon-->
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="apple-touch-icon" href="#">
    <!-- Font APIs & Font Awesome-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Audiowide:400,700" rel="stylesheet">
    <!-- Additional CSS Files -->
    <!-- DataTables -->

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
<section style="font-size: 12px!important;" class="min-vh-100">
    <div class="main-banner" style="padding-top: 100px!important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 my-2">
                    <div class="top-text header-text ">
                        <h3 class="text-white">UMS REPORT</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form class="bg-light bg-opacity-0">
                        <div>
                            <div class="row">
                                <div class="col-lg-2 align-self-center my-1">
                                    <input type="date" class="form-control" style="height: 24px">
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <fieldset>
                                        <select class="form-select my-1">
                                            <option selected>Project</option>
                                            <option>Homechit</option>
                                            <option>Link Review</option>
                                        </select>
                                    </fieldset>
                                </div>


                                <div class="col-lg-2 align-self-center">
                                    <fieldset>
                                        <select class="form-select my-1">
                                            <option selected>Communication</option>
                                            <option>Facebook</option>
                                            <option>Tiktok</option>
                                            <option>Adw</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <fieldset>
                                        <select class="form-select my-1">
                                            <option selected>Work</option>
                                            <option>Keyword new</option>
                                            <option>Audit</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <fieldset>
                                        <select class="form-select my-1">
                                            <option selected>Tools</option>
                                            <option>Keyword tools</option>
                                            <option>Facebook</option>
                                            <option>TH.KEY</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <fieldset>
                                        <select class="form-select my-1">
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
                                        <button type="submit" class="btn text-white main-white-button bg-secondary date"><i class="fa fa-search"></i> Search Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <div class="row ">
                <div class="col-12">
                    <div class="card shadow-lg mb-3 ">
                        <div class="card-header py-0">
                            <div class="row align-items-center justify-content-between" >
                                <div class="col-6 col-sm-auto d-flex align-items-center pr-0 m-3 my-0">
                                    <h4 class="fs-0 mb-0 text-nowrap py-2 py-xl-0" style="font-weight: 600;color: #5e5e5e;font-family: 'Audiowide'">
                                        UMS <span style="color: #e8a000">REPORT</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div>
                                <div class="card">
                                    <div class="table-responsive p-0">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr class="bg-white">
                                                <th>STT</th>
                                                <th>Nội dung</th>
                                                <th>Người Làm</th>
                                                <th>Người Support</th>
                                                <th>Người Giám Sát</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Duration</th>
                                                <th>Mã Công Việc</th>
                                                <th>Priority</th>
                                                <th>Chi Phí</th>
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
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.1</td>
                                                <td>1</td>
                                                <td>20$</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Nhận các mô hình máy học</td>
                                                <td>User 1</td>
                                                <td>User 2</td>
                                                <td>User 3</td>
                                                <td>2022-11-09</td>
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.2</td>
                                                <td>1</td>
                                                <td>9$</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phân tích dữ liệu</td>
                                                <td>User 1</td>
                                                <td>User 2</td>
                                                <td>User 3</td>
                                                <td>2022-11-09</td>
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.3</td>
                                                <td>1</td>
                                                <td>55$</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Chọn mô hình tốt nhất</td>
                                                <td>User 1</td>
                                                <td>User 2</td>
                                                <td>User 3</td>
                                                <td>2022-11-09</td>
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.4</td>
                                                <td>1</td>
                                                <td>14$</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Nhận bộ dữ liệu tổng</td>
                                                <td>User 1</td>
                                                <td>User 2</td>
                                                <td>User 3</td>
                                                <td>2022-11-09</td>
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.5</td>
                                                <td>1</td>
                                                <td>200$</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Phân tích dữ liệu tổng với mô hình được chọn</td>
                                                <td>User 1</td>
                                                <td>User 2</td>
                                                <td>User 3</td>
                                                <td>2022-11-09</td>
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.6</td>
                                                <td>1</td>
                                                <td>13$</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Báo cáo kết quả</td>
                                                <td>User 1</td>
                                                <td>User 2</td>
                                                <td>User 3</td>
                                                <td>2022-11-09</td>
                                                <td>2022-11-09</td>
                                                <td>4H</td>
                                                <td>PTDL20230227.6</td>
                                                <td>1</td>
                                                <td>15$</td>
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

<!-- End Scripts -->
</body>
</html>