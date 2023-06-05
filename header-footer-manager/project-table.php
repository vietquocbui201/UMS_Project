<div class=" pr-1" id="project-table">
    <!-- Box Comment -->
    <div class="card card-widget">
        <div class="card-header bg-secondary">
            <div class="user-block mt-1">
                <span class="username ml-0 text-white"><span>Project</span></span>
            </div>
            <button type="button" class="btn btn-warning mx-3 d-inline-block resize-btn" data-size="1"
                    data-for="project-table">
                <i class="fa-solid fa-left-right text-white"></i>
            </button>
            <button class="form-check d-inline-block btn btn-warning text-white restore-columns" data-table="#pj-table"
                    style="font-size: 14px">
                Show All
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive table-bordered p-0">
                <table class="table mb-0" id="pj-table">
                    <thead>
                    <tr class="bg-white h-100">
                        <th scope="col" class="align-middle text-center">
                            STT
                        </th>
                        <th scope="col" class="align-middle text-center">Nội dung</th>
                        <th scope="col" class="align-middle text-center" title="Worker"><i
                                    class="fa-solid fa-person-walking"></i></th>
                        <th scope="col" class="align-middle text-center" title="supporter"><i
                                    class="fa-solid fa-people-arrows"></i></th>
                        <th scope="col" class="align-middle text-center" title="supervisor"><i
                                    class="fa-solid fa-user-tie"></i></th>
                        <th scope="col" class="align-middle text-center">Start Date</th>
                        <th scope="col" class="align-middle text-center">End Date</th>
                        <th scope="col" class="align-middle text-center" title="Priority"><i
                                    class="fa-solid fa-layer-group"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $list = array();
                    if ($_SESSION['search']['start_date'] != null) {
                        $start_date = $_SESSION['search']['start_date'];
                        $end_date = $_SESSION['search']['end_date'];
                        $status = $_SESSION['search']['status'];
                        $option1 = $_SESSION['search']['option1'];
                        $option2 = $_SESSION['search']['option2'];
                        $option3 = $_SESSION['search']['option3'];
                        $option4 = $_SESSION['search']['option4'];
                        $option5 = $_SESSION['search']['option5'];
                        $id_group = $_SESSION['search']['group'];
                        $list_user = $_SESSION['search']['user'];
                        $id_project = intval($_GET["project_id"]);

                        $select_job = " SELECT * FROM `job` WHERE (project_id = '$id_project') AND (`type` = 'job') AND (`startdate` BETWEEN '$start_date' AND '$end_date') AND (`enddate` BETWEEN '$start_date' AND '$end_date') ";
                        if (!empty($list_user)) {
                            $select_job .= " AND (`worker` IN (".rtrim($list_user, ',').") OR `supporter` IN (".rtrim($list_user, ',').") OR `supervisor` IN (".rtrim($list_user, ',')."))";
                        }
                        if ($id_group != 0) {
                            $select_job = $select_job . "AND ('parent' IS NOT NULL AND `parent` = '$id_group')";
                        }
                        if ($status != 0) {
                            $select_job = $select_job . "AND ('status' IS NOT NULL AND `status` = '$status')";
                        }
                        if ($option1 != 0) {
                            $select_job = $select_job . "AND (`option1` IS NOT NULL AND `option1` = '$option1')";
                        }
                        if ($option2 != 0) {
                            $select_job = $select_job . "AND (`option2` IS NOT NULL AND `option2` = '$option2')";
                        }
                        if ($option3 != 0) {
                            $select_job = $select_job . "AND (`option3` IS NOT NULL AND `option3` = '$option3')";
                        }
                        if ($option4 != 0) {
                            $select_job = $select_job . "AND (`option4` IS NOT NULL AND `option4` = '$option4')";
                        }
                        if ($option5 != 0) {
                            $select_job = $select_job . "AND (`option5` IS NOT NULL AND `option5` = '$option5')";
                        };
                        $conn = open();
                        $list_job = select($conn, $select_job);
                        close($conn);
                        $index = 0;
                        foreach ($list_job as $job) {
                            $list[] = $job;
                            ?>
                            <tr data-id="<?php echo $job['id'] ?>" class="row-job">
                                <td class="text-center"><?php echo ++$index; ?></td>
                                <td class="text-center"><?php echo $job['title']; ?></td>
                                <?php
                                $conn = open();
                                $id_Worker = rtrim($job['worker'], ',');
                                $id_Supporter = rtrim($job['supporter'], ',');
                                $id_Supervisor = rtrim($job['supervisor'], ',');
                                $select_Worker = " SELECT * FROM `users` WHERE `id` in ($id_Worker); ";
                                $Worker = select($conn, $select_Worker);

                                $select_Supporter = " SELECT * FROM `users` WHERE `id` in ($id_Supporter); ";
                                $Supporter = select($conn, $select_Supporter);

                                $select_Supervisor = " SELECT * FROM `users` WHERE `id` in ($id_Supervisor); ";
                                $Supervisor = select($conn, $select_Supervisor);
                                close($conn);
                                ?>
                                <td class="py-0 text-center">
                                    <div class="py-1">
                                        <?php foreach ( $Worker as $wk ) { ?>
                                            <img
                                                    class="mr-1 rounded-circle role-<?php echo $wk['role']; ?>  img-user"
                                                    data-toggle="tooltip" role="<?php echo $wk['role']; ?>"
                                                    name-user="<?php echo $wk['name']; ?>"
                                                    style="width: 23px; height: 23px"
                                                    src="assets/images/<?php echo $wk['avatar'] == null ? "noavatar.png" : $wk['avatar'] ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="mr-1 py-0 text-center">
                                    <div class="py-1">
                                        <?php foreach ( $Supporter as $sp ) { ?>
                                            <img
                                                    class="rounded-circle role-<?php echo $sp['role']; ?> img-user"
                                                    data-toggle="tooltip" role="<?php echo $sp['role']; ?>"
                                                    name-user="<?php echo $sp['name']; ?>"
                                                    style="width: 23px; height: 23px"
                                                    src="assets/images/<?php echo $sp['avatar'] == null ? "noavatar.png" : $sp['avatar'] ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="py-0 text-center">
                                    <div class="py-1">
                                        <?php foreach ( $Supervisor as $sv ) { ?>
                                            <img
                                                    class="rounded-circle role-<?php echo $sv['role']; ?> img-user"
                                                    data-toggle="tooltip" role="<?php echo $sv['role']; ?>"
                                                    name-user="<?php echo $sv['name']; ?>" class="mr-1"
                                                    style="width: 23px; height: 23px"
                                                    src="assets/images/<?php echo $sv['avatar'] == null ? "noavatar.png" : $sv['avatar'] ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td><?php echo substr($job['startdate'], 0, 10); ?></td>
                                <td><?php echo substr($job['enddate'], 0, 10); ?></td>
                                <td><?php echo $job['prority']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else {
                        $select_job_group_list = " SELECT * FROM `job` WHERE `type` = 'group' AND project_id = '$id_project' ORDER BY `order_by`; ";
                        $conn = open();
                        $data_job_group_list = select($conn, $select_job_group_list);
                        close($conn);
                        foreach ($data_job_group_list as $group) {
                            $list[] = $group;
                            $conn = open();
                            $parent = $group['id'];
                            $select_job = "  SELECT * FROM `job` WHERE `type` = 'job' AND project_id = '$id_project' AND parent = '$parent' ORDER BY `order_by`; ";
                            $list_job = select($conn, $select_job);
                            close($conn);
                            ?>
                            <tr href="#" class="group-separator justify-content-center group_job">
                                <td colspan="99999" class="bg-secondary">
                                    <?php echo $group['title']; ?>
                                </td>
                            </tr>
                            <?php
                            $total_cost=0;
                            ?>
                            <?php foreach ($list_job as $job) {
                                $conn = open();
                                $job_idd = $job['id'];
                                $select_costs = " SELECT SUM(cost) AS total_costs FROM `Diary` WHERE job_id = $job_idd; ";
                                $costs = select($conn, $select_costs)[0]['total_costs'];
                                $total_cost = $total_cost + $costs;
                                close($conn);
                                if (not_allow($user, $job, $project)) continue;
                                $list[] = $job;
                                ?>
                                <tr data-id="<?php echo $job['id'] ?>" class="<?php echo $job['lock_active'] == 1 ? 'bg-secondary-subtle bg-locked' : 'fw-bold' ?> row-job">
                                    <td class="text-center"><?php echo ++$index; ?></td>
                                    <td class="text-left"><?php echo $job['title']; ?></td>
                                    <?php
                                    $conn = open();
                                    $id_Worker = rtrim($job['worker'], ',');
                                    $id_Supporter = rtrim($job['supporter'], ',');
                                    $id_Supervisor = rtrim($job['supervisor'], ',');
                                    $select_Worker = " SELECT * FROM `users` WHERE `id` in ($id_Worker); ";
                                    $Worker = select($conn, $select_Worker);

                                    $select_Supporter = " SELECT * FROM `users` WHERE `id` in ($id_Supporter); ";
                                    $Supporter = select($conn, $select_Supporter);

                                    $select_Supervisor = " SELECT * FROM `users` WHERE `id` in ($id_Supervisor); ";
                                    $Supervisor = select($conn, $select_Supervisor);
                                    close($conn);
                                    ?>
                                    <td class="py-0 text-center">
                                        <div class="py-1">
                                            <?php foreach ( $Worker as $wk ) { ?>
                                            <img
                                                    class="mr-1 rounded-circle role-<?php echo $wk['role']; ?>  img-user"
                                                    data-toggle="tooltip" role="<?php echo $wk['role']; ?>"
                                                    name-user="<?php echo $wk['name']; ?>"
                                                    style="width: 23px; height: 23px"
                                                    src="assets/images/<?php echo $wk['avatar'] == null ? "noavatar.png" : $wk['avatar'] ?>">
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="mr-1 py-0 text-center">
                                        <div class="py-1">
                                            <?php foreach ( $Supporter as $sp ) { ?>
                                            <img
                                                    class="rounded-circle role-<?php echo $sp['role']; ?> img-user"
                                                    data-toggle="tooltip" role="<?php echo $sp['role']; ?>"
                                                    name-user="<?php echo $sp['name']; ?>"
                                                    style="width: 23px; height: 23px"
                                                    src="assets/images/<?php echo $sp['avatar'] == null ? "noavatar.png" : $sp['avatar'] ?>">
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="py-0 text-center">
                                        <div class="py-1">
                                            <?php foreach ( $Supervisor as $sv ) { ?>
                                            <img
                                                    class="rounded-circle role-<?php echo $sv['role']; ?> img-user"
                                                    data-toggle="tooltip" role="<?php echo $sv['role']; ?>"
                                                    name-user="<?php echo $sv['name']; ?>" class="mr-1"
                                                    style="width: 23px; height: 23px"
                                                    src="assets/images/<?php echo $sv['avatar'] == null ? "noavatar.png" : $sv['avatar'] ?>">
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td><?php echo substr($job['startdate'], 0, 10); ?></td>
                                    <td><?php echo substr($job['enddate'], 0, 10); ?></td>
                                    <td class="text-center"><?php echo $job['prority']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <tr>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
<!--            <div class="row mx-1 my-2 align-items-center justify-content-center justify-content-md-between">-->
<!--                <div class="col-auto mb-2 mb-sm-0">-->
<!--                    <div class="col-auto">-->
<!--                        <div class=" rounded-pill">-->
<!--                            <ul class="pagination">-->
<!--                                <li class="page-item">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;border-top-left-radius: 10px;border-bottom-left-radius: 10px;font-size: 10px;font-weight: bold">-->
<!--                                        < </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item ">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> 1 </a>-->
<!--                                </li>-->
<!--                                <li class="page-item  border-0">-->
<!--                                    <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item ">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> 4 </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item ">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> 5 </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item ">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> 6 </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item ">-->
<!--                                    <a href="#" class="page-link font-weight-bold border-top-0 border-bottom-0"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> ... </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item ">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;font-size: 10px;font-weight: bold"> 23 </a>-->
<!--                                </li>-->
<!--                                <li class=" page-item next">-->
<!--                                    <a href="#" class="page-link font-weight-bold"-->
<!--                                       style="color: #e8a000;border-top-right-radius: 10px;border-bottom-right-radius: 10px;font-size: 10px; font-weight: bold">-->
<!--                                        > </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>