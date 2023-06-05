<div id="rate-table" class="col-lg-12 px-1" style="width: 1024px">
    <!-- Box Comment -->
    <div class="card card-widget">
        <div class="card-header bg-secondary">
            <div class="user-block mt-1">
                <span class="username ml-0 text-white"><span>Đánh Giá</span></span>
            </div>
            <button type="button" class="btn btn-warning mx-3 d-inline-block resize-btn" data-size="1"
                    data-for="rate-table">
                <i class="fa-solid fa-left-right text-white"></i>
            </button>
            <button class="form-check d-inline-block btn btn-warning text-white restore-columns" data-table="#r-table"
                    style="font-size: 14px">
                Show All
            </button>
            <a class="float-right"
                    style="font-size: 14px">
                <?php echo "Total cost: ".number_format($cost_sum_job , 0, ',', '.').'đ' ?>
            </a>
        </div>
        <div class="card-body">
            <div>
                <div>
                    <div class="table-responsive table-bordered p-0">
                        <table class="table mb-0" id="r-table">
                            <thead>
                            <tr class="bg-white">
                                <th class="align-middle text-center">Đánh iá</th>
                                <th class="align-middle text-center">Ghi Chú</th>
                                <th class="align-middle text-center">Bài Học</th>
                                <th class="align-middle text-center">Khác</th>
                                <th class="align-middle text-center"><?php $data_json = json_decode($project[0]['option3'], true); echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Ghi chú <?php echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center"><?php $data_json = json_decode($project[0]['option4'], true); echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Ghi chú <?php echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center"><?php $data_json = json_decode($project[0]['option5'], true); echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Ghi chú <?php echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Lock job</th>
                                <th class="align-middle text-center">Hoàn Thành</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < $count; $i++) {
                                if ($list[$i]['type'] == 'group') {
                                    ?>
                                    <tr class="group-separator text-white justify-content-center">
                                        <td colspan="99999" class="bg-secondary"><?php echo $list[$i]['title']; ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    ?>
                                    <tr data-id="<?php echo $list[$i]['id'] ?>" class="row-job <?php echo $list[$i]['lock_active'] == 1 ? 'bg-secondary-subtle bg-locked' : 'fw-bold' ; ?>">
                                        <?php $textassess = '<a class="view-assess" href="#" data-bs-toggle="modal" data-bs-target="#Modal">';
                                        if($list[$i]['assess'] != null){
                                            $textassess .= '<i class="fa-regular fa-eye text-dark"></i>';
                                        } else  {
                                            $textassess .= '<i class="fa-solid fa-pen text-dark"></i>';
                                        };
                                        $textassess .= '</a>';
                                        ?>

                                        <?php $textexperienc = '<a class="view-experience" href="#" data-bs-toggle="modal" data-bs-target="#Modal">';
                                        if($list[$i]['experience'] != null){
                                            $textexperienc .= '<i class="fa-regular fa-eye text-dark"></i>';
                                        } else  {
                                            $textexperienc .= '<i class="fa-solid fa-pen text-dark"></i>';
                                        };
                                        $textexperienc .= '</a>';
                                        ?>

                                        <td class="report-job align-middle text-center"><?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? '<a class="view-assess" ><i class="fa-solid fa-text-slash text-dark"></i>' : $textassess ?></a></td>
                                        <?php $note_rate = json_decode($list[$i]['note_rate']); ?>
                                        <td class="align-middle text-center"><input data-col="note_rate" data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100" type="text" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?>  value="<?php echo $note_rate->content; ?>"></td>
                                        <td class="report-job align-middle text-center"><?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? '<a class="view-experience" ><i class="fa-solid fa-text-slash text-dark"></i>' : $textexperienc ?></a></td>
                                        <?php $note_other = json_decode($list[$i]['note_other']); ?>
                                        <td class="align-middle text-center"><input data-col="note_other" data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100" type="text" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> value="<?php echo $note_other->content; ?>"></td>
                                        <td class="align-middle text-center">
                                            <select id="select_work_type" class="form-select-table select-status" name="Work_Type" data-col="option3" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> >
                                                <option <?php echo 0 == ($list[$i]['option3']) ? "selected" : " " ?> value="0"> </option>
                                                <?php $data_option1 = json_decode($project[0]['option3'], true);
                                                foreach ($data_option1['rows'] as $row) {
                                                    ?>
                                                    <option <?php echo ($row['id']) == ($list[$i]['option3']) ? "selected" : " " ?> value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <?php $note_option3 = json_decode($list[$i]['note_option3']); ?>
                                        <td class="align-middle text-center"><input data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100"  data-col="note_option3" type="text" value="<?php echo $note_option3->content; ?>" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> ></td>


                                        <td class="align-middle text-center">
                                            <select id="select_work_type" class="form-select-table select-status" name="Work_Type" data-col="option4" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> >
                                                <option <?php echo 0 == ($list[$i]['option4']) ? "selected" : " " ?> value="0"> </option>
                                                <?php $data_option1 = json_decode($project[0]['option4'], true);
                                                foreach ($data_option1['rows'] as $row) {
                                                    ?>
                                                    <option <?php echo ($row['id']) == ($list[$i]['option4']) ? "selected" : " " ?> value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <?php $note_option4 = json_decode($list[$i]['note_option4']); ?>
                                        <td class="align-middle text-center"><input data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100"  data-col="note_option4" type="text" value="<?php echo $note_option4->content; ?>" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> ></td>


                                        <td class="align-middle text-center">
                                            <select id="select_work_type" class="form-select-table select-status" name="Work_Type" data-col="option5" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> >
                                                <option <?php echo 0 == ($list[$i]['option5']) ? "selected" : " " ?> value="0"> </option>
                                                <?php $data_option1 = json_decode($project[0]['option5'], true);
                                                foreach ($data_option1['rows'] as $row) {
                                                    ?>
                                                    <option <?php echo ($row['id']) == ($list[$i]['option5']) ? "selected" : " " ?> value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <?php $note_option5 = json_decode($list[$i]['note_option5']); ?>
                                        <td class="align-middle text-center"><input data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100"  data-col="note_option5" type="text" value="<?php echo $note_option5->content; ?>" <?php echo (($list[$i]['lock_active'] == 1) || ($list[$i]['worker'] == $id_user) ||  ($role == 'user')) ? 'disabled' : '' ?> ></td>


                                        <td class="align-middle text-center">
                                            <div class="custom-control custom-switch">
                                                <input <?php echo $list[$i]['lock_active'] == 1 ? "checked" : " " ?> data-id-job="<?php echo $list[$i]['id'] ?>" type="checkbox" class="custom-control-input custom-control-input-warning switch-active-job" id="customSwitch<?php echo $list[$i]['id'] ?>" <?php echo (($role == 'user') || ($list[$i]['worker'] == $id_user)) ? 'disabled' : '' ?>  >
                                                <label class="custom-control-label" for="customSwitch<?php echo $list[$i]['id'] ?>"></label>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center">
                                            <div class="custom-control custom-switch">
                                                <input <?php echo $list[$i]['done'] == 1 ? "checked" : " " ?> data-id-job="<?php echo $list[$i]['id'] ?>" type="checkbox" class="custom-control-input custom-control-input-warning switch-done-job" id="customSwitchh<?php echo $list[$i]['id'] ?>" <?php echo (($role == 'user') || ($list[$i]['worker'] == $id_user)) ? 'disabled' : '' ?>  >
                                                <label class="custom-control-label" for="customSwitchh<?php echo $list[$i]['id'] ?>"></label>
                                            </div>
                                        </td>

                                    </tr>
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
                                <td class="text-center">
                                    <a class="justify-content-center d-inline-block hide-column">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>