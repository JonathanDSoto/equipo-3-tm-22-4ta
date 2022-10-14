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
                                                                                <a href="details.php" class="text-dark">
                                                                                    NAME
                                                                                </a>
                                                                            </h5>
                                                                            <p class="text-muted mb-0">
                                                                                Category : 
                                                                                <span class="fw-medium">
                                                                                    <a href="#">SEX</a>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                            <td data-column-id="stock" class="gridjs-td">
                                                                0
                                                            </td>
                                                            <td data-column-id="price" class="gridjs-td">
                                                                <span>
                                                                    $0
                                                                </span>
                                                            </td>
                                                            <td data-column-id="orders" class="gridjs-td">
                                                                0
                                                            </td>
                                                            <td data-column-id="rating" class="gridjs-td">
                                                                <span>
                                                                    <span class="badge bg-light text-body fs-12 fw-medium">
                                                                        <i class="mdi mdi-star text-warning me-1"></i>
                                                                            0
                                                                    </span>
                                                                </span>
                                                            </td>
                                                            <td data-column-id="published" class="gridjs-td">
                                                                <span>
                                                                    DAY MOUNTH, YEAR
                                                                    <small class="text-muted ms-1">
                                                                        HOUR:MINUTE AM/PM
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
                                                                                <a class="dropdown-item" href="details.php">
                                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                    View
                                                                                </a>
                                                                            </li>
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


    <script type="text/javascript">
        function logout(id){
            var bodyFormData = new FormData();
            bodyFormData.append('id', id);
            bodyFormData.append('action', 'logout');
            bodyFormData.append('global_token', '<?= $_SESSION['global_token'] ?>');
            if(id == <?= $_SESSION['id'] ?>){
                axios.post('<?= BASE_PATH ?>auth', bodyFormData)
                .then(function (response){
                    console.log(response.data);
                    if(response.data==true){
                        window.location = "<?= BASE_PATH ?>";
                    }
                })
                .catch(function (error){
                    console.log('error')
                })
            }else{
                
            }
        }
    </script>
    
</body>


</html>