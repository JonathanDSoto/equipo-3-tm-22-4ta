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
                                <h4 class="mb-sm-0">Order Details</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Order Details</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gx-lg-5">
                                        <!-- end col -->
                                        <div class="col">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>Order #FOLIO</h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <button data-bs-toggle="modal" data-bs-target="#showModal" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Order</button>   
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 d-flex justify-content-center">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Total :</p>
                                                                    <div v-if="presentations.length>0">
                                                                        <div v-for="price in presentations[0].price">
                                                                            <div v-if="price.is_current_price==1">
                                                                                ${{price.amount}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div v-else>
                                                                        <h6 class="mb-0">$ 0.00 </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-lg-3 col-sm-6">
                                                        <!-- <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-warning fs-24">
                                                                        <i class="ri-list-unordered"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Order Status :</p>
                                                                    <div>
                                                                        <h6 class="mb-0">Pendiente de pago</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-list-unordered"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Order Status :</p>
                                                                    <div>
                                                                        <h6 class="mb-0">Pagada</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-list-unordered"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Order Status :</p>
                                                                    <div>
                                                                        <h6 class="mb-0">Enviada</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-danger fs-24">
                                                                        <i class="ri-list-unordered"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Order Status :</p>
                                                                    <div>
                                                                        <h6 class="mb-0">Abandonada</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-warning fs-24">
                                                                        <i class="ri-list-unordered"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Order Status :</p>
                                                                    <div>
                                                                        <h6 class="mb-0">Pendiente de enviar</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-danger fs-24">
                                                                        <i class="ri-list-unordered"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Order Status :</p>
                                                                    <div>
                                                                        <h6 class="mb-0">Cancelada</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-dark fs-24">
                                                                        <i class="ri-coupon-2-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Coupon :</p>
                                                                    <div>
                                                                        <a href="../coupons/1">
                                                                          <h6 class="mb-0">Coupon xxx</h6>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <div class="product-content mt-5">
                                                    <h5 class="fs-14 mb-3">Order Description :</h5>
                                                    <nav>
                                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Details</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row" style="width: 200px;">Payment Method</th>
                                                                            <td>
                                                                                <h6>Cash</h6>
                                                                                <!-- <h6>Card</h6>
                                                                                <h6>Bank trasfer</h6> -->
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Client</th>
                                                                            <td>
                                                                                <a href="../clients/1" class="text-primary d-block">Client name</a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Address</th>
                                                                            <td>
                                                                              client address
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product-content -->

                                                <hr class="mt-4">
                                                <div class="d-flex justify-content-between">
                                                  <div>
                                                    <h5 class=" mb-3">Presentations:</h5>
                                                  </div>
                                                </div>
                                                <div class="product-content mt-2">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle mb-0" >
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">
                                                                      Cover
                                                                    </th>
                                                                    <th scope="col">
                                                                      Description
                                                                    </th>
                                                                    <th scope="col">
                                                                      Weight
                                                                    </th>
                                                                    <th scope="col">
                                                                      Quantity
                                                                    </th>
                                                                    <th scope="col">
                                                                        Price
                                                                    </th>
                                                                    <th scope="col">
                                                                        <div class="gridjs-th-content">Action</div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                          <div class="flex-shrink-0 me-3">
                                                                            <div class="avatar-sm bg-light rounded p-1">
                                                                              <img src="" alt="" class="img-fluid d-block">
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                      Description
                                                                    </td>
                                                                    <td>
                                                                      0g
                                                                    </td>
                                                                    <td>
                                                                      0
                                                                    </td>
                                                                    <td>
                                                                      $
                                                                    </td>
                                                                    <td data-column-id="action" class="gridjs-td">
                                                                        <span>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ri-more-fill"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                                    <li>
                                                                                        <button data-bs-toggle="modal" data-bs-target="#showModal" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit Quantity</button>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li>
                                                                                      <button data-bs-toggle="modal" data-bs-target="#deleteRecordModal" class="dropdown-item"><i class="ri-delete-bin-line align-bottom me-2 text-muted"></i> Delete Quantity</button>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- end table -->
                                                    </div>
                                                    <!-- end table responsive -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
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
        <?php include "../../layouts/orderModalEdit.template.php" ?>
        <?php include "../../layouts/orderModalDelete.template.php" ?>
    </div>
    <!-- END layout-wrapper -->
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
    
</body>


</html>