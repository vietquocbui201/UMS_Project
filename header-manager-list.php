
<nav class="main-header navbar navbar-expand navbar-white navbar-light m-autto border-0 hoadao fixed-top shadow-bottom" id="main-nav" style="z-index: 3;height: 100px">
    <button class="fa-solid fa-angle-left fs-2 border-0 bg-white text-ums" data-widget="pushmenu" aria-label="Push Menu"></button>
    <a href="#" class="header-logo" aria-label="logo">
    </a>
    <ul class="navbar-nav ml-auto mt-2 text-center">
        <li class="nav-item dropdown">
            <a class="nav-link active" href="manager.php">
                <span class="text-warning text-uppercase" style="font-weight: 500;font-size: 15px;letter-spacing: 1px">Home</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link"  href="add.php">
                <span class="text-dark text-uppercase" style="font-weight: 500;font-size: 15px;letter-spacing: 1px">UMS ADD</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#">
                <span class="text-dark text-uppercase" style="font-weight: 500;font-size: 15px;letter-spacing: 1px">Log In</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="fa-angle-right" data-bs-toggle="offcanvas" aria-label="OffCanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" >
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
                    <div class="col-2">
                        <a>1</a><br>
                        <a>2</a><br>
                        <a>3</a><br>
                        <a>4</a><br>
                        <a>5</a>
                    </div>
                    <div class="col-10">
                        <form id="report_form" action="#" enctype="multipart/form-data">
                        <input type="hidden" name="project_id" value="<?php echo $id_project; ?>">
                        <input type="hidden"  name="job_id">
                        <textarea name="ckeditor" class="ckeditor" id="ckeditor"></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
