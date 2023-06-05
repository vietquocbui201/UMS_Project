<aside id="aside" class="main-sidebar sidebar-light-info elevation-4 main-banner-aside" style="z-index: 10;">

    <div id="a-aside" class="brand-link border-0 shadow" style="height: 100px">
        <div class="pt-4" style="margin-left: 6px">
            <div class="d-flex">
                <i class="fa-solid fa-angles-left text-warning d-none text-start">
                </i>
                <i class="fa-solid fa-angles-right text-warning text-start">
                </i>
                <div class="input-group input-group-sm mb-2 search-aside" style="width: 150px;margin-left: 70px">
                    <input type="text" name="table_search" class="form-control float-right rounded" placeholder="Search" style="z-index: 1">

                    <div class="input-group-append">
                        <button type="submit" class="btn text-white btn-warning" style="border-radius: 5px;margin-left: -31px;z-index: 2;" aria-label="search"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-plus"></i>
                        <p>
                             Project
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php foreach ($list_project as $value){ ?>
                        <li class="nav-item <?php echo $value['status_project'] == 'in_active' ? 'bg-secondary bg-locked' : '' ?>">
                            <div href="#" class="nav-link">
                                <?php $link = "manager.php?project_id=".$value['id']."&check_search=0"; ?>
                                <?php echo ($user[0]['role'] == 'root' || $user[0]['role'] == 'admin' || $id_user == $value['owner']) ? '<a href="edit_form.php?id='.$value['id'].'" class="fa-solid fa-pen left"></a>' : ''; ?>
                                <a href="<?php echo $value['status_project'] == 'active' ? $link : '#' ?>" class="form-check-label"><?php echo $value['Name'] ?></a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>