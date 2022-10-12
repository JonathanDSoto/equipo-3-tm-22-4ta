<?php
	include_once "../../app/config.php";
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <?php include "../../layouts/head.template.php" ?>
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
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
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
                                <h4 class="mb-sm-0">Products</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col">
                            <div>
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="row g-4">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <a href="details.php" class="btn btn-success" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add Product</a>
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
                                                            <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                <div class="gridjs-th-content">Product</div>
                                                            </th>
                                                            <th data-column-id="stock" class="gridjs-th gridjs-th-sort text-muted" style="width: 94px;" tabindex="0">
                                                                <div class="gridjs-th-content">Stock</div>
                                                            </th>
                                                            <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" style="width: 101px;" tabindex="0">
                                                                <div class="gridjs-th-content">Price</div>
                                                            </th>
                                                            <th data-column-id="orders" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                <div class="gridjs-th-content">Orders</div>
                                                            </th>
                                                            <th data-column-id="rating" class="gridjs-th gridjs-th-sort text-muted" style="width: 105px;" tabindex="0">
                                                                <div class="gridjs-th-content">Rating</div>
                                                            </th>
                                                            <th data-column-id="published" class="gridjs-th gridjs-th-sort text-muted" style="width: 220px;" tabindex="0">
                                                                <div class="gridjs-th-content">Published</div>
                                                            </th>
                                                            <th data-column-id="action" class="gridjs-th text-muted" style="width: 80px;">
                                                                <div class="gridjs-th-content">Action</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="gridjs-tbody">
                                                        <tr class="gridjs-tr">
                                                            <td data-column-id="product" class="gridjs-td">
                                                                <span>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-3">
                                                                            <div class="avatar-sm bg-light rounded p-1">
                                                                                <img src="assets/images/products/img-1.png" alt="" class="img-fluid d-block">
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <h5 class="fs-14 mb-1">
                                                                                <a href="apps-ecommerce-product-details.html" class="text-dark">
                                                                                    Half Sleeve Round Neck T-Shirts
                                                                                </a>
                                                                            </h5>
                                                                            <p class="text-muted mb-0">
                                                                                Category : 
                                                                                <span class="fw-medium">
                                                                                    <a href="">Fashion</a>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                            <td data-column-id="stock" class="gridjs-td">
                                                                12
                                                            </td>
                                                            <td data-column-id="price" class="gridjs-td">
                                                                <span>
                                                                    $215.00
                                                                </span>
                                                            </td>
                                                            <td data-column-id="orders" class="gridjs-td">
                                                                48
                                                            </td>
                                                            <td data-column-id="rating" class="gridjs-td">
                                                                <span>
                                                                    <span class="badge bg-light text-body fs-12 fw-medium">
                                                                        <i class="mdi mdi-star text-warning me-1"></i>
                                                                            4.2
                                                                    </span>
                                                                </span>
                                                            </td>
                                                            <td data-column-id="published" class="gridjs-td">
                                                                <span>
                                                                    12 Oct, 2021
                                                                    <small class="text-muted ms-1">
                                                                        10:05 AM
                                                                    </small>
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
                                                                                <a class="dropdown-item" href="apps-ecommerce-product-details.html">
                                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                    View
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item edit-list" data-edit-id="1" href="apps-ecommerce-add-product.html">
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
                        <!-- end col -->
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
    <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Product ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>

    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <script src="../../../../unpkg.com/gridjs%405.1.0/plugins/selection/dist/selection.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>

    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>
    
</body>


</html>