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
        <div class="app-menu navbar-menu">
            <?php include "../../layouts/sidebar.template.php" ?>
        </div>
        <!-- Vertical Overlay-->
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
                    <!-- end page title -->
                    <div class="row">
                    <!-- start cart -->
                      <a href="">
                        <div class="col-xl-3 col-md-6">
                          <div class="card card-animate">
                              <div class="card-body">
                                  <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">CATEGORIE</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span>NAME</span></h2>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded-circle fs-2 shadow">
                                                
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                      </a>
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