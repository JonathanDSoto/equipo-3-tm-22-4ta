<?php
	include_once "../../app/config.php";
?> 
<!doctype html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <?php include "../../layouts/head.template.php" ?>
  <!-- swiper css -->
  <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.css">
  <!-- Layout config Js -->
  <script src="<?= BASE_PATH ?>public/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="<?= BASE_PATH ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?= BASE_PATH ?>public/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= BASE_PATH ?>public/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="<?= BASE_PATH ?>public/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <?php include "../../layouts/nav.template.php" ?>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <?php include "../../layouts/sidebar.template.php" ?>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg"></div>
                    </div>
                    <div class="pt-5 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <!--end col-->
                            <div class="col">
                                <div class="p-3">
                                    <h3 class="text-white mb-1">Name Lastname</h3>
                                    <p class="text-white-75">Role</p>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <a href="#" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Client</a>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Info</h5>
                                                        <div class="table-responsive ">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Full Name :</th>
                                                                        <td class="text-muted">NAME</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted">EMAIL</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Phone :</th>
                                                                        <td class="text-muted">PHONE</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Is suscribed :</th>
                                                                        <td class="text-muted">Is SUScribed</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Level :</th>
                                                                        <td class="text-muted">LEVEL NAME -> PROCENTAGE DISCOUNT</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                                <!-- start address -->
                                                <div>
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row g-4">
                                                                <div class="col-sm-auto">
                                                                    <div>
                                                                        <a href="details.php" class="btn btn-success" id="addAddress-btn"><i class="ri-add-line align-bottom me-1"></i> Add Address</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card header -->
                                                        <div class="card-body">
                                                            <div class="tab-content text-muted">
                                                                <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                                                    <!-- Tabla de productos -->
                                                                    <table role="grid" class="gridjs-table" style="height: auto;">
                                                                        <thead class="gridjs-thead">
                                                                            <tr class="gridjs-tr">
                                                                                <th data-column-id="name" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Address</div>
                                                                                </th>
                                                                                <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Action</div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="gridjs-tbody">
                                                                            <tr class="gridjs-tr">
                                                                                <td data-column-id="name" class="gridjs-td">
                                                                                    <span>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="flex-grow-1">
                                                                                                <h5 class="fs-14 mb-1">
                                                                                                    <p href="details.php" class="text-dark">
                                                                                                        ADDRESS
                                                                                                    </p>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </span>
                                                                                </td>
                                                                                <td data-column-id="action" class="gridjs-td">
                                                                                    <span>
                                                                                        <div class="dropdown">
                                                                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                <i class="ri-more-fill"></i>
                                                                                            </button>
                                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                                <li>
                                                                                                    <a class="dropdown-item edit-list" data-edit-id="1" href="#">
                                                                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> 
                                                                                                        Edit
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li class="dropdown-divider"></li>
                                                                                                <li>
                                                                                                    <a class="dropdown-item remove-list" href="#" data-id="1" data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                                        Delete
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- end tab pane -->
                                                            </div>
                                                            <!-- end tab content -->

                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end address -->
                                                <!-- start orders -->
                                                <div>
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row g-4">
                                                                <div class="col-sm-auto">
                                                                    <div>
                                                                        <a href="details.php" class="btn btn-success" id="addAddress-btn"><i class="ri-add-line align-bottom me-1"></i> Add Order</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card header -->
                                                        <div class="card-body">
                                                            <div class="tab-content text-muted">
                                                                <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                                                    <!-- Tabla de productos -->
                                                                    <table role="grid" class="gridjs-table" style="height: auto;">
                                                                        <thead class="gridjs-thead">
                                                                            <tr class="gridjs-tr">
                                                                                <th data-column-id="name" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Order</div>
                                                                                </th>
                                                                                <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Action</div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="gridjs-tbody">
                                                                            <tr class="gridjs-tr">
                                                                                <td data-column-id="name" class="gridjs-td">
                                                                                    <span>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="flex-grow-1">
                                                                                                <h5 class="fs-14 mb-1">
                                                                                                    <p href="details.php" class="text-dark">
                                                                                                        ADDRESS
                                                                                                    </p>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </span>
                                                                                </td>
                                                                                <td data-column-id="action" class="gridjs-td">
                                                                                    <span>
                                                                                        <div class="dropdown">
                                                                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                <i class="ri-more-fill"></i>
                                                                                            </button>
                                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                                <li>
                                                                                                    <a class="dropdown-item edit-list" data-edit-id="1" href="#">
                                                                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> 
                                                                                                        Edit
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li class="dropdown-divider"></li>
                                                                                                <li>
                                                                                                    <a class="dropdown-item remove-list" href="#" data-id="1" data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                                        Delete
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- end tab pane -->
                                                            </div>
                                                            <!-- end tab content -->

                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                            </div>
                                            <!-- end orders -->
                                            <!--end col-->
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end tab-pane-->
                                </div>
                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->
            <?php include "../../layouts/modal.template.php" ?>
            <?php include "../../layouts/footer.template.php" ?>
        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <?php include "../../layouts/function_footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>
    <!-- swiper js -->
    <script src="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.js"></script>
    <!-- profile init js -->
    <script src="<?= BASE_PATH ?>public/js/pages/profile.init.js"></script>
    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>
</body>


</html>