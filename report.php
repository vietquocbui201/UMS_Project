<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="AMZ Group">
    <meta name="author" content="AMZ Group">
    <title>TH UMS | UMS Report</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/adminums.min.css">
    <link rel="stylesheet" href="assets/css/report.css">
    <style>

    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
    include "header-footer-manager/header-manager-list.php";
    ?>

    <?php
    include "header-footer-manager/aside.php";
    ?>

    <div class="content-wrapper min-vh-100" style="padding-top: 120px">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bolder" ><i class="fa-regular fa-calendar-check"></i> Báo cáo hàng ngày</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm mt-1">
                            <input type="text" name="table_search" class="form-control shadow-sm float-right" aria-label="Search" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" aria-label="search" class="btn btn-warning shadow-sm"><i class="fas fa-search text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row mx-1 align-items-center justify-content-start my-2 border-0">
                        <div class="col-lg-3 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" aria-label="search" class="btn btn-warning shadow-sm btn-sm text-white">Select</button>
                                </div>
                                <input  type="date" aria-label="Date" class="form-control shadow-sm"
                                       placeholder="Select Date" style="height: 40px;">
                            </div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <button aria-label="Search" class="btn btn-warning btn-sm text-white shadow-sm">Search</button>
                        </div>
                    </div>
                    <table class="table table-striped table-borderless table-hover border-bottom">
                        <thead>
                        <tr class="border-top">
                            <th>
                                From
                            </th>
                            <th>
                                To
                            </th>
                            <th>
                                Content
                            </th>
                            <th>
                                Time Work
                            </th>
                            <th>
                                Overtime x1.5
                            </th>
                            <th>
                                Overtime x2
                            </th>
                            <th>
                                Meeting
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td data-label = "From" class="px-2">
                                <select aria-label="Time" class="form-select form-control">
                                    <?php
                                    for ($i = 7; $i < 21; $i ++) {
                                    ?>
                                        <option><?php echo $i ?>:00</option>
                                        <option><?php echo $i ?>:30</option>
                                    <?php
                                    }
                                    ?>
                                    <option>21:00</option>
                                </select>
                            </td>
                            <td data-label = "To" class="px-2">
                                <select aria-label="Time" class="form-select form-control">
                                    <?php
                                    for ($i = 7; $i < 21; $i ++) {
                                        ?>
                                        <option><?php echo $i ?>:00</option>
                                        <option><?php echo $i ?>:30</option>
                                        <?php
                                    }
                                    ?>
                                    <option>21:00</option>
                                </select>
                            </td>
                            <td data-label = "Content" class="px-2">
                                <textarea aria-label="text" cols="20" rows="1" class="w-100 form-control"></textarea>
                            </td>
                            <td data-label = "Time Work" class="px-2" >
                                <select aria-label="text" class="form-select form-control">
                                    <?php
                                    for ($i = 0; $i < 9; $i ++) {
                                        ?>
                                        <option><?php echo $i ?>:30</option>
                                        <option><?php echo $i ?>:00</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td data-label = "Overtime x1.5" class="px-2" >
                                <select aria-label="Time" class="form-select form-control">
                                    <?php
                                    for ($i = 0; $i < 2; $i ++) {
                                        ?>
                                        <option><?php echo $i ?>:00</option>
                                        <option><?php echo $i ?>:30</option>
                                        <?php
                                    }
                                    ?>
                                    <option>2:00</option>
                                </select>
                            </td>
                            <td data-label = "Overtime x2" class="px-2" >
                                <select aria-label="Time" class="form-select form-control">
                                    <?php
                                    for ($i = 0; $i < 2; $i ++) {
                                        ?>
                                        <option><?php echo $i ?>:00</option>
                                        <option><?php echo $i ?>:30</option>
                                        <?php
                                    }
                                    ?>
                                    <option>2:00</option>
                                </select>
                            </td>
                            <td data-label = "Meeting" class="px-2" >
                                <select aria-label="meet" class="form-select form-control">
                                    <option selected>--</option>
                                    <option>Tham gia</option>
                                    <option>Không tham gia</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bolder" ><i class="fa-solid fa-clipboard-list"></i> Báo cáo chung</h3>
                </div>
                <div class="card-body">
                    <div class="mx-3 mt-2">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="p-4 shadow rounded">
                                    <div class="progress-group">
                                        Số giờ làm/tháng
                                        <span class="float-right"><b>150</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        Số lần tham gia họp
                                        <span class="float-right"><b>2</b>/4</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Số giờ làm tăng ca</span>
                                        <span class="float-right"><b>480</b>/800</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        Số lần báo cáo muộn
                                        <span class="float-right"><b>2</b></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="small-box card-outline card-primary">
                                    <div class="inner">
                                        <h3>150<sup style="font-size: 20px">h</sup></h3>
                                        <p>Số giờ làm/tháng</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-clock text-primary"></i>
                                    </div>
                                </div>
                                <div class="small-box card-outline card-danger">
                                    <div class="inner">
                                        <h3>1<sup style="font-size: 20px">d</sup></h3>

                                        <p>Số ngày nghỉ</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-power-off text-danger"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box card-outline card-secondary">
                                    <div class="inner">
                                        <h3>2</h3>

                                        <p>Số lần tham gia họp</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-comments-dollar text-secondary"></i>
                                    </div>
                                </div>
                                <div class="small-box card-outline card-info">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">h</sup></h3>

                                        <p>Số giờ làm tăng ca </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-hourglass-start text-info"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box card-outline card-warning">
                                    <div class="inner">
                                        <h3>2</h3>

                                        <p>Số lần tham gia họp</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-timeline text-warning"></i>
                                    </div>
                                </div>
                                <div class="small-box card-outline card-success">
                                    <div class="inner">
                                        <h3>6<sup style="font-size: 20px">tr</sup>033<sup style="font-size: 20px">k</sup></h3>

                                        <p>Tiền lương </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-sack-dollar text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <?php
    include "header-footer-manager/larger-right-offcanvas.php";
    ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<script src="assets/js/adminlte.min.js"></script>
</body>
</html>
