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
                                <h4 class="mb-sm-0">Coupon Details</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Coupon Details</li>
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
                                    <div class="row gx-lg">
                                        <!-- end col -->
                                        <div class="col-xl">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>Discount: {{coupon.percentage_discount}}<i class="ri-percent-line"></i></h4>
                                                        <!-- <h4>amount_discount <i class="ri-hand-coin-line"></i></h4> -->
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <button :id="coupon.id" :data-coupon="JSON.stringify(coupon)" v-on:click="editCoupon(coupon.id)" data-bs-toggle="modal" data-bs-target="#couponModal" class="btn btn-success" id="addUserBtn"><i class="ri-pencil-fill align-bottom"></i> Edit Coupon</button>
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
                                                                    <p class="text-muted mb-1">Min Amount Required:</p>
                                                                    <h5 class="mb-0">${{coupon.min_amount_required}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-primary fs-24">
                                                                        <i class="ri-shopping-bag-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Min Products Required:</p>
                                                                    <h5 class="mb-0">{{coupon.min_product_required}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                          <div class="d-flex align-items-center">
                                                              <div class="avatar-sm me-2">
                                                                  <div class="avatar-title rounded bg-transparent text-secondary fs-24">
                                                                      <i class="las la-hourglass-end"></i>
                                                                  </div>
                                                              </div>
                                                              <div class="flex-grow-1">
                                                                  <p class="text-muted mb-1">End Date:</p>
                                                                  <h5 class="mb-0">{{coupon.end_date}}</h5>
                                                              </div>
                                                          </div>
                                                      </div>
                                                </div>
                                                
                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Type :</h5>
                                                    <p>{{coupon.couponable_type}}</p>
                                                </div>
                                                <!-- Coupon-content -->
                                                <div class="Coupon-content mt-5">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">
                                                                        Folio
                                                                    </th>
                                                                    <th scope="col">
                                                                        Status
                                                                    </th>
                                                                    <th scope="col">
                                                                        Client
                                                                    </th>
                                                                    <th scope="col">
                                                                        Total
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="order in coupon.orders">
                                                                    <td>
                                                                        <a :href="'<?=BASE_PATH?>orders/'+order.id">
                                                                            {{order.folio}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-success" v-if="order.is_paid!=0">
                                                                        <i class="ri-checkbox-circle-line fs-17 align-middle"></i> 
                                                                        Paid
                                                                    </td>
                                                                    <td class="text-danger" v-else>
                                                                        <i class="ri-forbid-line fs-17 align-middle"></i> 
                                                                        Not Paid
                                                                    </td>
                                                                    <td>
                                                                        <a :href="'<?=BASE_PATH?>clients/'+order.client_id">
                                                                            {{order.client_id}}
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        ${{order.total}}
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
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
            <?php include "../../layouts/couponModal.template.php" ?>
        </div>
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
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>
</body>


</html>