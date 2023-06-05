<div class="card-body px-0 py-2">
    <div>
        <div>
            <div class="table-responsive p-0">
                <table class="table table-bordered" id="edit_job">
                    <thead>
                    <tr class="bg-white text-center" >
                        <th>#</th>
                        <th  data-col="tile">Nội dung</th>
                        <th data-col="worker">Worker</th>
                        <th data-col="supporter">Supporter</th>
                        <th data-col="supporter">Supervisor</th>
                        <th data-col="startdate"> Start Date</th>
                        <th data-col="enddate">End date</th>
                        <th data-col="prority">Pty</th>
                        <th>Act</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($job_group as $data) {
                        $parent = $data['id'];
                        $select_job = "  SELECT * FROM `job` WHERE `type` = 'job' AND project_id = '$id' AND parent = '$parent' ORDER BY `order_by`; ";
                        $list_job = select($conn, $select_job);
                        ?>
                        <tr class="bg-secondary group_id" data-id="<?php echo $data['id'] ?>" group-order-by="<?php echo $data['order_by'] ?>">
                            <td class="border-0"></td>
                            <td colspan="7"
                                class="fw-bold border-0"><?php echo $data['title'] ?>
                            </td>
                            <td class="border-0">
                                <div class="d-flex justify-content-center">
                                    <button type="button"
                                            class="btn btn-secondary dow-group"
                                            style="padding: 0px 5px;font-size: 12px">
                                        <i class="fa-solid fa-arrow-down"></i>
                                    </button>
                                    <button type="button"
                                            class="btn btn-danger button-delete-group"
                                            style="padding: 0px 5px;font-size: 14px">
                                        <i class="fa-brands fa-uncharted"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php
                        foreach ($list_job as $job) { ?>
                        <tr data-id="<?php echo $job['id'] ?>" order-by="<?php echo $job['order_by'] ?>" parent="<?php echo $job['parent'] ?>" >
                            <td data-project-id="<?php echo $id; ?>" class="text-center parent-job" data-parent="<?php echo $job['parent'] ?>">
                                <p class="btn btn-info text-white" style="padding: 0px 5px;font-size: 12px">
                                    G
                                </p>
                            </td>
                            <td class="py-0">
                                <div class=" mt-2 ml-4">
                                    <input class="update-now form-input-table w-100" value="<?php echo $job['title']; ?>" data-table="job" data-col="title" style="width:300px;">
                                </div>
                            </td>
                            <?php
                            $id_Worker = rtrim($job['worker'], ',');
                            $id_Supporter = rtrim($job['supporter'], ',');
                            $id_Supervisor = rtrim($job['supervisor'], ',');

                            $select_Worker = " SELECT * FROM `users` WHERE `id` IN ($id_Worker); ";
                            $Worker =  select($conn, $select_Worker);

                            $select_Supporter = " SELECT * FROM `users` WHERE `id` IN ($id_Supporter); ";
                            $Supporter =  select($conn, $select_Supporter);

                            $select_Supervisor = " SELECT * FROM `users` WHERE `id` IN ($id_Supervisor); ";
                            $Supervisor = select($conn, $select_Supervisor);
                            ?>

                            <td class="py-0">
                                <div class="py-1">
                                    <?php foreach ( $Worker as $wk ) { ?>
                                         <img title="<?php echo $wk['name'] ?>" class="rounded-circle role-<?php echo $wk['role']; ?> " role="<?php echo $wk['role']; ?>"  name-user="<?php echo $wk['name'];?>" class="mr-1" style="width: 30px; height: 30px" src="assets/images/<?php echo $wk['avatar']==null ? "noavatar.png" : $wk['avatar']  ?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="py-1">
                                    <?php foreach ( $Supporter as $sp ) { ?>
                                        <img title="<?php echo $sp['name'] ?>" class="rounded-circle role-<?php echo $sp['role']; ?> " data-toggle="tooltip" role="<?php echo $sp['role']; ?>" name-user="<?php echo $sp['name']; ?>" class="mr-1" style="width: 30px; height: 30px" src="assets/images/<?php echo $sp['avatar']==null ? "noavatar.png" : $sp['avatar']?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="py-1">
                                    <?php foreach ( $Supervisor as $sv ) { ?>
                                        <img title="<?php echo $sv['name'] ?>" class="rounded-circle role-<?php echo $sv['role']; ?> " data-toggle="tooltip" role="<?php echo $sv['role']; ?>" name-user="<?php echo $sv['name']; ?>" class="mr-1" style="width: 30px; height: 30px" src="assets/images/<?php echo $sv['avatar']==null ? "noavatar.png" : $sv['avatar']?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="d-flex justify-content-center">
                                    <input type="date" data-table="job" data-col="startdate"
                                           class="form-input-table mt-2 update-now" value="<?php echo substr($job['startdate'], 0,10); ?>" style="width:90px;">
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="d-flex justify-content-center">
                                    <input type="date" data-table="job" data-col="enddate"
                                           class="form-input-table mt-2 update-now" value="<?php echo substr($job['enddate'], 0,10); ?>" style="width:90px;">
                                </div>
                            </td>
                            <td class="py-0" >
                                <fieldset class="justify-content-center d-flex">
                                    <select class="form-select-table mt-2" name="Pty" style="width:auto; " >
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </fieldset>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center" data-id="<?php echo $job['id'] ?>">
                                    <button type="button"
                                            class="btn btn-light down-job"
                                            style="padding: 0px 5px;font-size: 12px">
                                        <i class="fa-solid fa-arrow-down"></i>
                                    </button>
                                    <button type="button"
                                            class="btn btn-danger delete-job"
                                            style="padding: 0px 5px;font-size: 12px">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>


                    <?php
                    $select_job_default = "  SELECT * FROM `job` WHERE `type` = 'job' AND project_id = '$id' AND parent = 0 ORDER BY `order_by`; ";
                    $list_job_default = select($conn, $select_job_default);
                    ?>
                    <tr id="default" class="bg-secondary group_id" >
                        <td class="border-0"></td>
                        <td colspan="7"
                            class="fw-bold border-0">
                            Default
                        </td>
                        <td class="border-0">
                            <div class="d-flex justify-content-center">
                                <button type="button"
                                        class="btn btn-danger d-none"
                                        style="padding: 0px 5px;font-size: 14px">
                                    <i class="fa-brands fa-uncharted"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php
                    foreach ($list_job_default as $job) { ?>
                        <tr data-id="<?php echo $job['id'] ?>">
                            <td data-project-id="<?php echo $id; ?>" class="text-center parent-job" data-parent="<?php echo $job['parent'] ?>">
                                <p class="btn btn-info text-white" style="padding: 0px 5px;font-size: 12px">
                                    G
                                </p>
                            </td>
                            <td class="py-0">
                                <div class=" mt-2 ml-4">
                                    <input class="update-now form-input-table w-100" value="<?php echo $job['title']; ?>" data-table="job" data-col="title" style="width:300px;">
                                </div>
                            </td>
                            <?php
                            $id_Worker = rtrim($job['worker'], ',');
                            $id_Supporter = rtrim($job['supporter'], ',');
                            $id_Supervisor = rtrim($job['supervisor'], ',');

                            $select_Worker = " SELECT * FROM `users` WHERE `id` IN ($id_Worker); ";
                            $Worker =  select($conn, $select_Worker);

                            $select_Supporter = " SELECT * FROM `users` WHERE `id` IN ($id_Supporter); ";
                            $Supporter =  select($conn, $select_Supporter);

                            $select_Supervisor = " SELECT * FROM `users` WHERE `id` IN ($id_Supervisor); ";
                            $Supervisor = select($conn, $select_Supervisor);
                            ?>
                            <td class="py-0">
                                <div class="py-1">
                                    <?php foreach ( $Worker as $wk ) { ?>
                                        <img title="<?php echo $wk['name'] ?>" class="rounded-circle role-<?php echo $wk['role']; ?> img-user" role="<?php echo $wk['role']; ?>"  name-user="<?php echo $wk['name'];?>" class="mr-1" style="width: 30px; height: 30px" src="assets/images/<?php echo $wk['avatar']==null ? "noavatar.png" : $wk['avatar']  ?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="py-1">
                                    <?php foreach ( $Supporter as $sp ) { ?>
                                        <img title="<?php echo $sp['name'] ?>" class="rounded-circle role-<?php echo $sp['role']; ?> img-user" data-toggle="tooltip" role="<?php echo $sp['role']; ?>" name-user="<?php echo $sp['name']; ?>" class="mr-1" style="width: 30px; height: 30px" src="assets/images/<?php echo $sp['avatar']==null ? "noavatar.png" : $sp['avatar']?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="py-1">
                                    <?php foreach ( $Supervisor as $sv ) { ?>
                                        <img title="<?php echo $sv['name'] ?>" class="rounded-circle role-<?php echo $sv['role']; ?> img-user" data-toggle="tooltip" role="<?php echo $sv['role']; ?>" name-user="<?php echo $sv['name']; ?>" class="mr-1" style="width: 30px; height: 30px" src="assets/images/<?php echo $sv['avatar']==null ? "noavatar.png" : $sv['avatar']?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="d-flex justify-content-center">
                                    <input type="date"
                                           class="form-input-table mt-2" value="<?php echo substr($job['startdate'], 0,10); ?>" style="width:90px;">
                                </div>
                            </td>
                            <td class="py-0">
                                <div class="d-flex justify-content-center">
                                    <input type="date"
                                           class="form-input-table mt-2" value="<?php echo substr($job['enddate'], 0,10); ?>" style="width:90px;">
                                </div>
                            </td>
                            <td class="py-0">
                                <fieldset class="justify-content-center d-flex">
                                    <select class="form-select-table mt-2" name="Pty" style="width:auto;">
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </fieldset>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center" data-id="<?php echo $job['id'] ?>">
                                    <button type="button"
                                            class="btn btn-danger delete-job"
                                            style="padding: 0px 5px;font-size: 12px" >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr id="add_group_job">
                        <td>#</td>
                        <td class="py-0 text-center" data-id="<?php echo $id; ?>">
                            <input type="text"
                                   class="form-input-table mt-2 d-inline w-75"
                                   name="title_new_group"
                            >
                            <button type="button"
                                    class="btn btn-info text-white button-add-group"
                                    style="padding: 0px 5px;font-size: 12px">
                                +G
                            </button
                        </td>

                        <td class="py-0" >
                            <fieldset class="form-input-table py-1 ">
                                <button type="button"
                                        class="btn btn-info text-white button_add_user"
                                        style="padding: 0px 5px;font-size: 12px">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                <input type="hidden" class="form-control list_id_user" name="Worker"  value="">
                            </fieldset>
                            <div class="form-group d-none" id="addusernametext"
                                 style=" position: absolute; z-index: 999;">
                            </div>
                        </td>

                        <td class="py-0">
                            <fieldset class="form-input-table py-1 ">
                                <button type="button"
                                        class="btn btn-info text-white button_add_user"
                                        style="padding: 0px 5px;font-size: 12px">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                <input type="hidden" class="form-control list_id_user" name="Supporter" value="">
                            </fieldset>
                        </td>

                        <td class="py-0">
                            <fieldset class="form-input-table py-1 ">
                                <button type="button"
                                        class="btn btn-info text-white button_add_user"
                                        style="padding: 0px 5px;font-size: 12px">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                <input type="hidden" class="form-control list_id_user" name="Supervisor" value="">
                            </fieldset>
                        </td>

                        <td class="py-0">
                            <div class="d-flex justify-content-center">
                                <input type="date"
                                       class="form-input-table mt-2" name="startdata" value="<?php echo  date('Y-m-d') ?>" style="width:90px;">
                            </div>
                        </td>
                        <td class="py-0">
                            <div class="d-flex justify-content-center">
                                <input type="date"
                                       class="form-input-table mt-2" name="enddate" value="<?php echo  date('Y-m-d') ?>" style="width:90px;">
                            </div>
                        </td>
                        <td class="py-0">
                            <fieldset>
                                <select class="form-select-table mt-2" name="prority" style="width:auto;">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </fieldset>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button"
                                        class="btn btn-info button-add-job"
                                        style="padding: 0px 5px;font-size: 12px" data-id="<?php echo $id; ?>">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>