<div id="job-table" class="col-lg-12 pr-1" style="width: 1024px">
    <!-- Box Comment -->
    <div class="card card-widget">
        <div class="card-header bg-secondary">
            <div class="user-block mt-1">
                <span class="username ml-0 text-white"><span>Công Việc</span></span>
            </div>
            <button type="button" class="btn btn-warning mx-3 d-inline-block resize-btn" data-size="1"
                    data-for="job-table">
                <i class="fa-solid fa-left-right text-white"></i>
            </button>
            <button class="form-check d-inline-block btn btn-warning text-white restore-columns" data-table="#j-table"
                    style="font-size: 14px">
                Show All
            </button>

        </div>

        <div class="card-body">
            <div>
                <div>
                    <div class="table-responsive table-bordered p-0">
                        <table class="table mb-0 table-hideable" id="j-table">
                            <thead>
                            <tr class="bg-white">
                                <th class="align-middle text-center">Báo cáo</th>
                                <th class="align-middle text-center">Link Báo Cáo</th>
                                <th class="align-middle text-center">Ghi Chú</th>
                                <th class="align-middle text-center">Trạng Thái</th>
                                <th class="align-middle text-center"><?php $data_json = json_decode($project[0]['option1'], true); echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Ghi chú <?php echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center"><?php $data_json = json_decode($project[0]['option2'], true); echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Ghi chú <?php echo $data_json['caption'] ?></th>
                                <th class="align-middle text-center">Chi Phí</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = count($list);
                            $cost_sum_job = 0;
                            ?>
                            <?php
                            for ($i = 0; $i < $count; $i++) {
                                if ($list[$i]['type'] == 'group') {
                                    ?>
                                    <tr class="group-separator  text-white justify-content-center">
                                        <td colspan="99999" class="bg-secondary"><?php echo $list[$i]['title']; ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    ?>
                                    <tr data-id="<?php echo $list[$i]['id'] ?>" class="row-job <?php echo $list[$i]['lock_active'] == 1 ? 'bg-secondary-subtle bg-locked' : 'fw-bold' ; ?>" >
                                        <?php $report = '<a class="view-report-job" href="#" data-bs-toggle="modal" data-bs-target="#Modal">';
                                        if($list[$i]['report'] != null){
                                            $report .= '<i class="fa-regular fa-eye text-dark"></i>';
                                        } else  {
                                            $report .= '<i class="fa-solid fa-pen text-dark"></i>';
                                        };
                                        $report .= '</a>';
                                        ?>

                                        <?php $report_link = '<a class="view-link-report-job" href="#" data-bs-toggle="modal" data-bs-target="#Modal-link-report">';
                                        if($list[$i]['report_link'] != null){
                                            $report_link .= '<i class="fa-regular fa-eye text-dark"></i>';
                                        } else  {
                                            $report_link .= '<i class="fa-solid fa-pen text-dark"></i>';
                                        };
                                        $report_link .= '</a>';
                                        ?>

                                        <td class="report-job align-middle text-center"><?php echo ($list[$i]['lock_active'] == 1  ) ? '<a class="view-report-job" ><i class="fa-solid fa-text-slash text-dark"></i></a>' : $report ?></td>
                                        <td class="report-job align-middle text-center"><?php echo ($list[$i]['lock_active'] == 1 ) ? '<a class="view-link-report-job" ><i class="fa-solid fa-text-slash text-dark"></i></a>' : $report_link ?></td>
                                        <?php $note = json_decode($list[$i]['note']); ?>
                                        <td class="align-middle text-center"><input data-col="note" data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100" title="<?php echo $note->content; ?>"  name="text-note" type="text" value="<?php echo $note->content; ?>" <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?> ></td>
                                        <td class="align-middle text-center">
                                            <select id="select_work_type"
                                                    class="form-select-table select-status" data-col="status"
                                                    <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?>
                                                    >
                                                    <option <?php echo 0 == ($list[$i]['status']) ? "selected" : " " ?> value="0"> </option>
                                                <?php $data_option1 = json_decode($project[0]['status'], true);
                                                foreach ($data_option1['rows'] as $row) {
                                                    ?>
                                                    <option <?php echo ($row['id']) == ($list[$i]['status']) ? "selected" : " " ?> value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="align-middle text-center">
                                            <select id="select_work_type"
                                                    class="form-select-table select-status" data-col="option1"
                                                    name="Work_Type"
                                                    <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?>
                                                    >
                                                    <option <?php echo 0 == ($list[$i]['option1']) ? "selected" : " " ?> value="0"> </option>
                                                <?php $data_option1 = json_decode($project[0]['option1'], true);
                                                foreach ($data_option1['rows'] as $row) {
                                                    ?>
                                                    <option <?php echo ($row['id']) == ($list[$i]['option1']) ? "selected" : " " ?> value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <?php $note_option1 = json_decode($list[$i]['note_option1']); ?>
                                        <td class="align-middle text-center"><input data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100"  data-col="note_option1"  type="text" value="<?php echo $note_option1->content; ?>" <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?> ></td>
                                        <td class="align-middle text-center">
                                            <select id="select_work_type"
                                                    class="form-select-table select-status" data-col="option2"
                                                    name="Work_Type"
                                                    <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?>
                                                    >
                                                    <option <?php echo 0 == ($list[$i]['option2']) ? "selected" : " " ?> value="0"> </option>
                                                <?php $data_option1 = json_decode($project[0]['option2'], true);
                                                foreach ($data_option1['rows'] as $row) {
                                                    ?>
                                                    <option <?php echo ($row['id']) == ($list[$i]['option2']) ? "selected" : " " ?> value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <?php $note_option2 = json_decode($list[$i]['note_option2']); ?>
                                        <td class="align-middle text-center"><input data-user="<?php echo $id_user; ?>" class="text-note form-input-table w-100"  data-col="note_option2" type="text" value="<?php echo $note_option2->content; ?>" <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?> ></td>
                                        <?php
                                        $job_id=$list[$i]['id'];
                                        $id_wallet = $wallet_id[0]['id'];
                                        $cost = SumCostUser($id_wallet,$job_id,$role);
                                        $cost_sum_job =$cost_sum_job+$cost;
                                        ?>
                                        <td class="align-middle text-center"><a data-id-wallet="<?php echo $wallet_id[0]['name']; ?>" data-id-role-user="<?php echo $role; ?>" class="open_dairy_trading" data-bs-toggle="modal" data-bs-target="#Modal_cost_detail" data-user="<?php echo $id_user; ?>" <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?> <?php echo ($list[$i]['lock_active'] == 1) ? 'disabled' : '' ?> > <?php echo number_format($cost , 0, ',', '.').'đ' ?></a></td>
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