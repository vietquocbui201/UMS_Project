<nav class="main-header navbar navbar-expand navbar-white navbar-light m-autto border-0 hoadao fixed-top shadow-bottom"
     id="main-nav" style="z-index: 3;height: 100px">
    <button class="fa-solid fa-angle-left fs-2 border-0 bg-white text-ums" data-widget="pushmenu"
            aria-label="Push Menu"></button>
    <a href="manager.php" class="header-logo" aria-label="logo">
    </a>
    <ul class="navbar-nav ml-auto mt-2 text-center">
        <li class="nav-item dropdown">
            <a class="nav-link active" href="manager.php">
                <span class="text-warning text-uppercase" style="font-weight: 500;font-size: 15px;letter-spacing: 1px">Home</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <?php if ($role == 'admin' || $role == 'manager' || $role == 'root') { ?>
                <a class="nav-link" href="add.php">
                    <span class="text-dark text-uppercase" style="font-weight: 500;font-size: 15px;letter-spacing: 1px">UMS ADD</span>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#">
                <span class="text-dark text-uppercase" style="font-weight: 500;font-size: 15px;letter-spacing: 1px">Log In</span>
            </a>
        </li>
        <li class="user-account dropdown">
            <div class="user-info me-2 ms-4 mt-2" data-toggle="dropdown" aria-expanded="false">
                <img class="user-account-img" src="assets/images/<?php echo $user[0]['avatar']; ?>"
                     style="width: 30px;height: 30px;border-radius: 50% !important;object-fit: cover;">
                <a class="user-account-name text-black" href="#" title=""><?php echo $name_user ?></a>
                <i class="fa fa-caret-down user-account-name-caret-down" aria-hidden="true"></i>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="fa-angle-right" data-bs-toggle="offcanvas" aria-label="OffCanvas"
               href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fa-solid fa-angle-right fs-2 text-warning"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link d-none" id="fa-angle-left">
                <i class="fa-solid fa-angle-left fs-2 text-warning"></i>
            </a>
        </li>
    </ul>
</nav>

<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Báo cáo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row compare-group">
                    <div class="col-2 p-1">
                        <ul class="list-group">
                            <li class="list-group-item text-center">History</li>
                        </ul>
                        <ul class="list-group" id="last-update-report-job" style="max-height:450px; overflow-y:auto;">
                            <li class="list-group-item">Last submit</li>
                        </ul>
                    </div>
                    <div class="col-10">
                        <form id="report_form" action="#" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="project_id" value="<?php echo $id_project; ?>">
                            <input type="hidden" name="job_id">
                            <input type="hidden" name="colum_data">
                            <input type="hidden" name="user_create_report_job" value="<?php echo $name_user; ?>">
                            <textarea name="ckeditor" class="ckeditor" id="ckeditor"></textarea>
                            <input type="submit" data-bs-dismiss="modal" aria-label="Close">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Modal-link-report" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Link Báo Cáo</h1>
                <div>
                    <button id="add-video-button" class="btn btn-outline-warning text-end mx-2 mb-1"
                            aria-label="Add Video"><i class="fa-solid fa-plus"></i> Video
                    </button>
                    <button id="add-img-button" class="btn btn-outline-warning text-end mx-2 mb-1" aria-label="Add Img">
                        <i class="fa-solid fa-plus"></i> Img
                    </button>
                    <button id="add-link-button" class="btn btn-outline-warning text-end mx-2 mb-1"
                            aria-label="Add Link"><i class="fa-solid fa-plus"></i> Link
                    </button>
                    <button id="add-file-button" class="btn btn-outline-warning text-end mx-2 mb-1"
                            aria-label="Add File"><i class="fa-solid fa-plus"></i> File
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <!--                    Chỉnh cuộn overflow-->
            <div class="modal-body vh-100 overflow-auto">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title text-white fw-bold">Video</h3>
                    </div>
                    <div class="card-body row overflow-auto" style="max-height: 300px">
                        <div class="row" id="video-list-iframe">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title text-white fw-bold">Image</h3>
                    </div>
                    <div class="card-body">
                        <div class="row overflow-auto" style="max-height: 300px" id="img-list-iframe">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title text-white fw-bold">Link</h3>
                    </div>
                    <div class="card-body overflow-auto" style="max-height: 190px">
                        <ul class="pl-4 mt-2 cf-title" id="link-list">

                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title text-white fw-bold">File</h3>
                    </div>
                    <div class="card-body overflow-auto" style="max-height: 190px" id="file-list">

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="Modal_cost_detail" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content table-responsive" style="height: 400px">
            <table class="table" >
                <thead>
                <tr>
                    <th scope="col" class="align-middle text-center">STT</th>
                    <th scope="col" class="align-middle text-center">Ngày</th>
                    <th scope="col" class="align-middle text-center">Nội dung</th>
                    <th scope="col" class="align-middle text-center">Từ ví</th>
                    <th scope="col" class="align-middle text-center">Đến ví</th>
                    <th scope="col" class="align-middle text-center">Cost</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <?php
                $conn = open();
                $select_wallet = " SELECT * FROM `wallet`; ";
                $wallet_list = select($conn, $select_wallet);
                close($conn);
                ?>
                <tbody id="wallet_list" >

                </tbody>
                <tbody>
                    <tr>
                        <th class="align-middle text-center" scope="row" id="stt-add-trading"></th>
                        <td class="align-middle text-center"><input name="data_Trading" type="datetime-local"
                                                                    class="form-input-table shadow" style="font-size: 10px;"
                                                                    value="<?php echo date("Y-m-d H:i:s"); ?>"></td>
                        <td class="align-middle text-center"><input class="text-note form-input-table w-100"
                                                                    name="content_Trading" type="text"></td>
                        <td class="align-middle text-center">
                            <select id="select_from" class="form-select-table select-status"
                                    name="Trading_from">
                                <?php
                                $conn = open();
                                $select_id_wallet = " SELECT * FROM `wallet` WHERE `owner` = $id_user; ";
                                $id_wallet = select($conn, $select_wallet)[0]['id'];
                                $data = select_cost($id_wallet);
                                ?>
                                <?php foreach ($wallet_list as $wallet) {
                                    if ($wallet['owner'] == $id_user){
                                        ?>
                                        <option selected value="<?php echo $wallet['id']?>"><?php echo $wallet['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                        <td class="align-middle text-center">
                            <select id="select_to" class="form-select-table select-status"
                                    name="Trading_to">
                                <option selected value="0"></option>
                                <?php foreach ($wallet_list as $wallet) { ?>
                                    <option value="<?php echo $wallet['id'] ?>"><?php echo $wallet['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <input type="hidden" value="" name="job_id_wallet">
                        <td class="align-middle text-center"><input class="text-note form-input-table w-100"
                                                                    name="cost_Trading" type="text"></td>
                        <td class="align-middle text-center"><a class="text-black add-cost" href="#"><i
                                        class="fa-solid fa-plus"></i></a></td>
                        </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col text-bold text-sm">Ban đầu: <?php echo number_format($data[3] , 0, ',', '.')."đ"; ?></div>
                <div class="col text-bold text-sm">Doanh thu: <?php echo number_format($data[0] , 0, ',', '.')."đ"; ?></div>
                <div class="col text-bold text-sm">Chi phí: <?php echo number_format($data[1] , 0, ',', '.')."đ"; ?></div>
                <div class="col text-bold text-sm">Lợi nhuận: <?php echo number_format($data[2] , 0, ',', '.')."đ"; ?></div>
                <div class="col text-bold text-sm">Số dư: <?php echo number_format($data[4] , 0, ',', '.')."đ"; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="modal-content d-none bd-gray-400" id="view-report" style=" position: absolute; z-index: 999;">
    <div class="modal-body">
        <div class="row compare-group">
            <div class="col-12">
                <form id="report_form" action="#" enctype="multipart/form-data" method="post">
                    <div id="ckeditor2"></div>
                </form>
            </div>
        </div>
    </div>
</div>