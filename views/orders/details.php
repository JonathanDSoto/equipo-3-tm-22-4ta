<?php
	include_once "../../app/config.php";
    include "../../app/OrderController.php";
    $or = new OrderController();
	$order = $or->getOrderById($_GET['order']);
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
                                                        <h4>Order #{{order.folio}}</h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <button :id="order.id" :data-order="JSON.stringify(order)" v-on:click="editOrder(order.id)" data-bs-toggle="modal" data-bs-target="#showModal" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Order</button>   
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
                                                                    <div v-if="order.total!=''">
                                                                        ${{order.total}}
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
                                                                        <span class="badge badge-soft-warning text-uppercase" v-if="'<?=$order->order_status->name?>'=='Pediente de pago'">Pendiente de pago</span>
                                                                        <span class="badge badge-soft-success text-uppercase" v-else-if="'<?=$order->order_status->name?>'=='Pagada'">Pagada</span>
                                                                        <span class="badge badge-soft-success text-uppercase" v-else-if="'<?=$order->order_status->name?>'=='Enviada'">Enviada</span>
                                                                        <span class="badge badge-soft-danger text-uppercase" v-else-if="'<?=$order->order_status->name?>'=='Abandonado'">Abandonado</span>
                                                                        <span class="badge badge-soft-warning text-uppercase" v-else-if="'<?=$order->order_status->name?>'=='Pendiente de enviar'">Pendiente de enviar</span>
                                                                        <span class="badge badge-soft-danger text-uppercase" v-else>Cancelada</span>
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
                                                                        <a href="<?=BASE_PATH?>coupons/<?=$order->coupon->id?>">
                                                                            <?php if(($order->coupon)!=null): ?>
                                                                                <h6 class="mb-0"><?=$order->coupon->name?></h6>
                                                                            <?php endif; ?>
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
                                                                                <h6><?=$order->payment_type->name?></h6>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Client</th>
                                                                            <td>
                                                                                <a href="<?=BASE_PATH?>clients/<?=$order->client->id?>" class="text-primary d-block"><?=$order->client->name?></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Address</th>
                                                                            <td>
                                                                                <?=$order->address->street_and_use_number?>
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
                                                                      Code
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($order->presentations as $presentation): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div class="avatar-sm bg-light rounded p-1" v-if="'<?=$presentation->cover?>'!=ruta">
                                                                                    <img src="https://crud.jonathansoto.mx/storage/products/<?=$presentation->cover?>" alt="" class="img-fluid d-block">
                                                                                </div>
                                                                                <div class="avatar-sm bg-light rounded p-1" v-else>
                                                                                    <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-13.png" alt="" class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?=$presentation->code?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$presentation->description?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$presentation->weight_in_grams?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$presentation->pivot->quantity?>
                                                                        </td>
                                                                        <td>
                                                                            $<?=$presentation->current_price->amount?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
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