<div id="gantt-table" class="col-lg-12 px-1" style="width: 1024px">
    <!-- Box Comment -->
    <div class="card card-widget">
        <div class="card-header bg-secondary">
            <div class="user-block mt-1">
                <span class="username ml-0 text-white"><span>GANTT</span></span>
            </div>
            <button type="button" class="btn btn-warning mx-3 d-inline-block resize-btn" data-size="1"
                    data-for="gantt-table">
                <i class="fa-solid fa-left-right text-white"></i>
            </button>
            <button class="form-check d-inline-block btn btn-warning text-white restore-columns" data-table="#g-table"
                    style="font-size: 14px">
                Show All
            </button>
            <button class="d-inline-block btn btn-warning text-white hideSa" data-table="#g-table">
                SaturdayHide
            </button>
            <button class="d-inline-block btn btn-warning text-white hideSu" data-table="#g-table">
                SundayHide
            </button>
        </div>

        <?php
        if($_SESSION['search']['start_date'] != null && $_SESSION['search']['end_date'] != null ){
            $start_date = $_SESSION['search']['start_date'];
            $end_date =  $_SESSION['search']['end_date'];
        }else{
            $start_date = $project[0]['Start_Date'];
            $end_date =  $project[0]['End_Date'];
        }
        ?>

        <div class="card-body">
            <table id="g-table" class="table table-bordered table-responsive">
                <thead class="thead-dark">
                <div class="month">
                <?php
                $start = new DateTime($start_date);
                $end = new DateTime($end_date);
                while ($start <= $end) {
                    if($start == new DateTime($start_date)){
                        $month = $start->format('m');
                        $month_name = $start->format('F');
                        $num_days = $start->format('t');
                        echo "<th data-name-month='".$month."' colspan='".$num_days+1-$start->format('d')."' class='text-center date-gantt-month'>$month_name</th>";
                    }
                    if ($start->format('d') == "01" && $start <= new DateTime($end_date)) {
                        $month = $start->format('m');
                        $month_name = $start->format('F');
                        $num_days = $start->format('t');
                        echo "<th data-name-month='".$month."' colspan='$num_days' class='text-center date-gantt-month'>$month_name</th>";
                    }
                    if ($start->format('d') == "01" && $start > new DateTime($end_date)) {
                        $start = new DateTime($end_date);
                        $month = $start->format('m');
                        $month_name = $start->format('F');
                        $num_days = $start->format('t');
                        echo "<th data-name-month='".$month."' colspan='$num_days' class='text-center date-gantt-month'>$month_name</th>";
                    }
                    $start->modify('first day of next month');
                }
                ?>
                </div>
                <tr>
                    <?php
                    $day = new DateTime($start_date);
                    $interval = $day->diff(new DateTime($end_date));
                    ?>
                    <?php
                    for ($i = 0; $i <= $interval->days; $i++) {
                    ?>
                    <th date-month="<?php echo $day->format('m'); ?>" scope="col" class="mw-30 text-center date-gantt <?php echo ($day->format('d-m-y') == date("d-m-y")) ? "bg-danger" : ""; ?> "><?php echo $day->format('d'); $day->add(new DateInterval('P1D')); ?></th>
                    <?php } ?>
                </tr>
                <tr>
                    <?php
                    $day = new DateTime($start_date);
                    $interval = $day->diff(new DateTime($end_date));
                    for ($i = 0; $i <= $interval->days; $i++) {
                    ?>
                        <th scope="col" class="mw-30 text-center <?php echo (substr($day->format('l'), 0, 1)) =='S' ? 'bg-secondary' : 'bg-white' ?>"><?php echo substr($day->format('l'), 0, 2); $day->add(new DateInterval('P1D')); ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < $count; $i++) {
                    if ($list[$i]['type'] == 'group') {
                        ?>
                        <tr class="group-separator bg-white text-black justify-content-center">
                            <td colspan="99999" class="bg-secondary"><?php echo $list[$i]['title']; ?></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <tr data-id="<?php echo $list[$i]['id'] ?>" class="row-job">
                            <?php
                            $day = new DateTime($start_date);
                            $interval = $day->diff(new DateTime($end_date));
                            for ($j = 0; $j <= $interval->days; $j++) { ?>
                                <td class="<?php gantt_color($list[$i]['startdate'], $list[$i]['enddate'], $day->format('Y-m-d H:i:s'), $list[$i]['done'], $list[$i]['Completion_Time'] ); $day->add(new DateInterval('P1D'));; ?>" ></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
                <tr class="<?php echo $list[$i]['lock_active'] == 1 ? 'bg-secondary' : '' ; ?>" >
                    <?php  for ($j = 0; $j <= $interval->days; $j++) { ?>
                        <td class="text-center">
                            <a class="justify-content-center d-inline-block hide-column">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                        </td>
                    <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>