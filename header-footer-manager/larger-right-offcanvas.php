<!--  Larger Off canvas-->
<div class="offcanvas offcanvas-end main-banner-right-aside border-0 shadow" tabindex="-1" data-bs-backdrop="false" id="offcanvasExample" data-bs-scroll="true"  style="z-index: 90000; width: 750px;" >
    <div class="offcanvas-header mx-3 mt-3 pb-0 cf-title">
        <h3 class="offcanvas-title" id="offcanvasExampleLabel" style="color:#fd9700;padding-right: 80px">Project Detail</h3>
        <button type="button" class="ml-1 btn-close text-reset" data-bs-dismiss="offcanvas" ></button>
    </div>
    <div id="source-html" class="offcanvas-body">
        <div class="mb-1">
            <h3>Job Content</h3>
            <div class="card p-2">
                <?php echo $project[0]['Job_Content'] ?>
            </div>
            <h3>Explain</h3>
            <div class="card p-2">
                <?php echo $project[0]['Job_Explain'] ?>
            </div>
            <h3>Request</h3>
            <div class="card p-2">
                <?php echo $project[0]['Job_Request'] ?>
            </div>
            <h3>Target</h3>
            <div class="card p-2">
                <?php echo $project[0]['Job_Target'] ?>
            </div>
        </div>
    </div>
    <div class="m-4 d-flex">
    </div>
</div>
<!--  End larger off canvas-->