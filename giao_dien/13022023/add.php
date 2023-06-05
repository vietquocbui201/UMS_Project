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
    <link href="https://fonts.googleapis.com/css?family=Audiowide:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/adminlte.css">
    <link rel="stylesheet" href="assets/css/animated.css">
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
                                        <form>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Project Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter project">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Time</label>
                                                            <fieldset>
                                                                <select class="form-control form-select">
                                                                    <option selected>---</option>
                                                                    <option>1 Day</option>
                                                                    <option>2 Day</option>
                                                                    <option>7 Day</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Work</label>
                                                            <fieldset>
                                                                <select class="form-control form-select">
                                                                    <option selected>---</option>
                                                                    <option>Data analysis</option>
                                                                    <option>Keyword new</option>
                                                                    <option>Audit</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Work ID</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>User</label>
                                                            <fieldset>
                                                                <select class="form-control form-select">
                                                                    <option selected>---</option>
                                                                    <option>Huân</option>
                                                                    <option>Hà</option>
                                                                    <option>Điêp</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Job Content</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Explain</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Request</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Target</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body px-0 py-2">
                                                    <div>
                                                        <div>
                                                            <div class="table-responsive p-0" >
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr class="bg-white">
                                                                        <th>#</th>
                                                                        <th>Nội dung</th>
                                                                        <th>Worker</th>
                                                                        <th>Supporter</th>
                                                                        <th>Supervisor</th>
                                                                        <th>Start Date</th>
                                                                        <th>Time</th>
                                                                        <th>Pty</th>
                                                                        <th>Act</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="bg-secondary border-0"></td>
                                                                        <td colspan="7" class="bg-secondary fw-bold border-0">Group</td>
                                                                        <td class="bg-secondary border-0">
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 14px"><i class="fa-brands fa-uncharted"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <input type="checkbox">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2 ml-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                                                </svg>
                                                                                Lấy dữ liệu đầu vào</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 1</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 2</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 3</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">02/03/2023</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">4H</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">1</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-trash"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <input type="checkbox">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2 ml-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                                                </svg>
                                                                                Lấy dữ liệu đầu vào</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 1</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 2</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 3</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">02/03/2023</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">4H</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">1</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-trash"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <input type="checkbox">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">Lấy dữ liệu đầu vào</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 1</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 2</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 3</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">02/03/2023</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">4H</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">1</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-trash"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bg-secondary border-0"></td>
                                                                        <td colspan="7" class="bg-secondary fw-bold border-0">Group</td>
                                                                        <td class="bg-secondary border-0">
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 14px"><i class="fa-brands fa-uncharted"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <input type="checkbox">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2 ml-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                                                </svg>
                                                                                Lấy dữ liệu đầu vào</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 1</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 2</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 3</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">02/03/2023</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">4H</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">1</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-trash"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <input type="checkbox">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2 ml-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                                                </svg>
                                                                                Lấy dữ liệu đầu vào</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 1</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 2</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 3</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">02/03/2023</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">4H</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">1</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-trash"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <input type="checkbox">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">Lấy dữ liệu đầu vào</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 1</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 2</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">User 3</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">02/03/2023</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">4H</div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class=" mt-2">1</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-danger" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-trash"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#</td>
                                                                        <td class="py-0 text-center">
                                                                            <input type="text" class="form-input-table mt-2 d-inline w-75">
                                                                            <button class="btn btn-secondary d-inline" style="padding: 0px 5px;font-size: 12px;width: 10%"><i class="text-white fa-solid fa-object-group"></i></button>

                                                                        </td>
                                                                        <td class="py-0">
                                                                            <fieldset>
                                                                                <select class="form-select-table mt-2">
                                                                                    <option selected>---</option>
                                                                                    <option>User 1</option>
                                                                                    <option>User 2</option>
                                                                                    <option>User 3</option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <fieldset>
                                                                                <select class="form-select-table mt-2">
                                                                                    <option selected>---</option>
                                                                                    <option>User 1</option>
                                                                                    <option>User 2</option>
                                                                                    <option>User 3</option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <fieldset>
                                                                                <select class="form-select-table mt-2">
                                                                                    <option selected>---</option>
                                                                                    <option>User 1</option>
                                                                                    <option>User 2</option>
                                                                                    <option>User 3</option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <div class="d-flex justify-content-center">
                                                                                <input type="date" class="form-input-table mt-2">
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0 text-center">
                                                                            <fieldset class="d-inline-block" style="width: 50px">
                                                                                <select class="form-select-table mt-2">
                                                                                    <option selected>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                </select>
                                                                            </fieldset>
                                                                            <div class="d-inline-block">
                                                                                <button type="button" class="btn btn-info text-white" style="padding: 0px 5px;font-size: 12px">H</button>
                                                                                <button type="button" class="btn btn-info text-white d-none" style="padding: 0px 5px;font-size: 12px">D</button>
                                                                                <button type="button" class="btn btn-info text-white d-none" style="padding: 0px 5px;font-size: 12px">M</button>
                                                                            </div>
                                                                        </td>
                                                                        <td class="py-0">
                                                                            <fieldset>
                                                                                <select class="form-select-table mt-2">
                                                                                    <option selected>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-info" style="padding: 0px 5px;font-size: 12px"><i class="fa-solid fa-plus text-white"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="font-size: 14px">
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Status</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <form action="">
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" style="font-size: 12px">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link text-center">
                                                                                <span class="text-dark">Caption</span>
                                                                            </div>
                                                                        </li>
                                                                    </form>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Option 1</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <form action="">
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" style="font-size: 12px">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link text-center">
                                                                                <span class="text-dark">Caption</span>
                                                                            </div>
                                                                        </li>
                                                                    </form>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Option 2</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <form action="">
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" style="font-size: 12px">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link text-center">
                                                                                <span class="text-dark">Caption</span>
                                                                            </div>
                                                                        </li>
                                                                    </form>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Option 3</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <form action="">
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" style="font-size: 12px">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link text-center">
                                                                                <span class="text-dark">Caption</span>
                                                                            </div>
                                                                        </li>
                                                                    </form>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Option 4</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <form action="">
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" style="font-size: 12px">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link text-center">
                                                                                <span class="text-dark">Caption</span>
                                                                            </div>
                                                                        </li>
                                                                    </form>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="card card-widget widget-user-2">
                                                            <div class="widget-user-header bg-warning">
                                                                <h5 class="text-light fw-bold">Option 5</h5>
                                                            </div>
                                                            <div class="card-footer p-0" >
                                                                <ul class="nav flex-column form-group">
                                                                    <form action="">
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="radio1">
                                                                                    <label class="form-check-label text-dark" style="width: 100px">Radio</label>
                                                                                    <button type="button" class="float-right badge bg-warning border-0"><i class="fa-solid fa-minus text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link pb-1">
                                                                                <div class="input-group pb-1">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                          #
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" style="font-size: 12px">
                                                                                    <div class="input-group-append">
                                                                                        <div class="input-group-text"><i class="fa-solid fa-plus"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="nav-item border-bottom">
                                                                            <div class="nav-link text-center">
                                                                                <span class="text-dark">Caption</span>
                                                                            </div>
                                                                        </li>
                                                                    </form>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

<!-- End Scripts -->
</body>
</html>