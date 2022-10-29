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
                                                        <h4>percentage_discount<i class="ri-percent-line"></i></h4>
                                                        <!-- <h4>amount_discount <i class="ri-hand-coin-line"></i></h4> -->
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <a href="" class="btn btn-light" data-bs-toggle="modal" @click="" data-bs-toggle="modal" data-bs-target="#couponModal" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
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
                                                                    <h5 class="mb-0">$min_amount_required</h5>
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
                                                                    <h5 class="mb-0">min_product_required</h5>
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
                                                                  <p class="text-muted mb-1">end_date:</p>
                                                                  <h5 class="mb-0">min_product_required</h5>
                                                              </div>
                                                          </div>
                                                      </div>
                                                </div>
                                                
                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Description :</h5>
                                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
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
                                                                <!-- borra esto vvvvvvvv -->
                                                                        Status (is_paid)
                                                                    </th>
                                                                    <th scope="col">
                                                                        Client (client_id -> nombre con consulta)
                                                                    </th>
                                                                    <th scope="col">
                                                                        Total
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                      82713
                                                                    </td>
                                                                    <!-- <td class="text-success">
                                                                        <i class="ri-checkbox-circle-line fs-17 align-middle"></i> 
                                                                        Paid
                                                                    </td> -->
                                                                      <td class="text-danger">
                                                                        <i class="ri-forbid-line fs-17 align-middle"></i> 
                                                                        Not Paid
                                                                      </td>
                                                                    <td>
                                                                        <div class="d-flex gap-2 align-items-center">
                                                                            <div class="flex-shrink-0">
                                                                                <img src="" alt="sex" class="avatar-xs rounded-circle">
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                Client name 
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        $00
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

            <footer class="footer">
                <?php include "../../layouts/footer.template.php" ?>
            </footer>
            <?php include "../../layouts/couponModal.template.php" ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <?php include "../../layouts/footer.template.php" ?>
    <?php include "../../layouts/function_footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "../../layouts/scripts.template.php" ?>
</body>


</html>