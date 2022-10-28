<?php
	include_once "../../app/config.php";
?> 
<!DOCTYPE html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <?php include "../../layouts/head.template.php" ?>
</head>
<body>
    
    <!-- Begin page -->
    <div id="contenedor">
        <header id="page-topbar">
            <?php include "../../layouts/nav.template.php" ?>
        </header>
        <!-- ========== App Menu ========== -->
        <?php include "../../layouts/sidebar.template.php" ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
              <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Categories</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Categories</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse card-header border-0 mb-3">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <button data-bs-toggle="modal" data-bs-target="#categorieModal" class="btn btn-success" id="addUserBtn"><i class="ri-add-line align-bottom me-1"></i> Add Categorie</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                    <!-- start cart -->
                        <div class="col-xl-3 col-md-6">
                            <a class="card-body" href="">
                                <div class="card card-height-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info text-white rounded-2 fs-2 shadow">
                                                    <i class="bx bx-receipt"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-medium text-muted mb-3">ANOTHER TEXT</p>
                                                <h4 class="fs-4 mb-3"><span>NAME CATEGORIE</span></h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-ghost-danger waves-effect waves-light shadow-none bx bx-trash"></button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#categorieModal" class="btn btn-ghost-info waves-effect waves-light shadow-none bx bx-pencil"></button>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->

                  </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include "../../layouts/footer.template.php" ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <?php include "../../layouts/modal.template.php" ?>
    <?php include "../../layouts/categoryModal.template.php" ?>
    <?php include "../../layouts/function_footer.template.php" ?>
    
    <?php include "../../layouts/scripts.template.php" ?>
    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <script src="../../../../unpkg.com/gridjs%405.1.0/plugins/selection/dist/selection.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>
    </script>
    
</body>


</html>