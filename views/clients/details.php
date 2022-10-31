<?php
	include_once "../../app/config.php";
    include "../../app/ClientController.php";
    include "../../app/AddressController.php";
    $cl = new ClientController();
    $as = new AddressController();
    if(isset($_GET['id'])){
        $client = $cl->getClientById($_GET['id']);
        $addresses = $as->getClientAdresses($_GET['id']);
	}
    //  var_dump($addresses);
?> 
<!DOCTYPE html>
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
    <div id="contenedor">
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
                                    <h3 class="text-white mb-1"><?= $client->name ?></h3>
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
                                            <!-- <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                            </a> -->
                                        </li>
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <button id="<?php echo $client->id ?>" data-client='<?php echo json_encode($client) ?>' @click="editClient('<?php echo $client->id ?>')" data-bs-toggle="modal" data-bs-target="#clientModal" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Client</button>
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
                                                                        <td class="text-muted"><?= $client->name ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted"><?= $client->email ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Phone :</th>
                                                                        <td class="text-muted"><?= $client->phone_number ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Is suscribed :</th>
                                                                        <td class="text-success" v-if="<?= $client->is_suscribed ?>==1">
                                                                            <i class="ri-checkbox-circle-line fs-17 align-middle"></i>
                                                                        </td>
                                                                        <td class="text-danger" v-else>
                                                                            <i class="ri-forbid-line fs-17 align-middle"></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Level :</th>
                                                                        <td class="text-muted"><?= $client->level->name ?></td>
                                                                    </tr><tr>
                                                                        <th class="ps-0" scope="row">PROCENTAGE DISCOUNT :</th>
                                                                        <td class="text-muted"><?= $client->level->percentage_discount ?>%</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                                <!-- start orders -->
                                                <div>
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row g-4">
                                                                <div class="col-sm-auto">
                                                                    <div class="mt-2">
                                                                        <h4>Orders</h4>
                                                                    </div>
                                                                    <div>
                                                                        <a href="<?= BASE_PATH ?>orders/" class="btn btn-success" id="addAddress-btn"><i class="ri-add-line align-bottom me-1"></i> Add Order</a>
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
                                                                                <th data-column-id="folio" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Folio</div>
                                                                                </th>
                                                                                <th data-column-id="folio" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Order status</div>
                                                                                </th>
                                                                                <th data-column-id="folio" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">No. Address</div>
                                                                                </th>
                                                                                <th data-column-id="folio" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Payment type</div>
                                                                                </th>
                                                                                <th data-column-id="folio" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Coupon</div>
                                                                                </th>
                                                                                <th data-column-id="total" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Total</div>
                                                                                </th>
                                                                                <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Action</div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="gridjs-tbody">
                                                                            <?php foreach($client->orders as $order): ?>
                                                                                <tr class="gridjs-tr">
                                                                                    <td data-column-id="folio" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p href="details.php" class="text-dark">
                                                                                                            <?= $order->folio ?>
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="folio" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark"><?=$order->order_status->name?></p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="folio" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark"><?= $order->address_id ?></p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="folio" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark"><?= $order->payment_type->name ?></p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="folio" class="gridjs-td">
                                                                                        <span>
                                                                                            <?php if(isset($order->coupon->name)): ?>
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="flex-grow-1">
                                                                                                        <h5 class="fs-14 mb-1">
                                                                                                            <p class="text-dark"><?= $order->coupon->name ?></p>
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                        </span>
                                                                                    </td>
                                                                                    <!-- Mostrar los articulos de la orden -->
                                                                                    <!-- <td data-column-id="total" class="gridjs-td">
                                                                                        <hr>
                                                                                        <?php foreach($order->presentations as $presentation): ?>
                                                                                            <span>
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="flex-shrink-0 me-3">
                                                                                                        <div class="avatar-sm bg-light rounded p-1">
                                                                                                            <img src="https://crud.jonathansoto.mx/storage/products/<?=$presentation->cover?>" alt="" class="img-fluid d-block">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="flex-grow-1">
                                                                                                        <h5 class="fs-14 mb-1">
                                                                                                            <a href="<?= BASE_PATH ?>products/<?=$presentation->id?>" class="text-dark">
                                                                                                                <?= $presentation->description ?>
                                                                                                            </a>
                                                                                                        </h5>
                                                                                                        <h6 class="mb-1">
                                                                                                            <?= $presentation->pivot->quantity ?>
                                                                                                        </h6>
                                                                                                        <h6 class="mb-1">
                                                                                                            $<?= $presentation->current_price->amount ?>
                                                                                                        </h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </span>
                                                                                            <hr>
                                                                                        <?php endforeach ?>
                                                                                    </td> -->
                                                                                    <td data-column-id="total" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                            $<?= $order->total ?>
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
                                                                                                        <a class="dropdown-item" href="<?= BASE_PATH ?>orders/<?= $order->id ?>">
                                                                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                                            View
                                                                                                        </a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endforeach ?>
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
                                            <!-- start address -->
                                            <div>
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row g-4">
                                                                <div class="col-sm-auto">
                                                                    <div>
                                                                        <button @click="createAddress()" data-bs-toggle="modal" data-bs-target="#addressModal" class="btn btn-success" id="addAddress-btn"><i class="ri-add-line align-bottom me-1"></i> Add Address</button>
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
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">No. Address</div>
                                                                                </th>
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Street and Number</div>
                                                                                </th>
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Apartment</div>
                                                                                </th>
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Postal Code</div>
                                                                                </th>
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">City</div>
                                                                                </th>
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Province</div>
                                                                                </th>
                                                                                <th data-column-id="address" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Phone Number</div>
                                                                                </th>
                                                                                <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                                    <div class="gridjs-th-content">Action</div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="gridjs-tbody">
                                                                            <?php foreach($addresses as $address): ?>
                                                                                <tr class="gridjs-tr">
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->id ?> 
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->street_and_use_number ?> 
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->apartment ?> 
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->postal_code ?> 
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->city ?> 
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->province ?> 
                                                                                                        </p>
                                                                                                    </h5>
                                                                                                </div>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td data-column-id="name" class="gridjs-td">
                                                                                        <span>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-grow-1">
                                                                                                    <h5 class="fs-14 mb-1">
                                                                                                        <p class="text-dark">
                                                                                                           <?= $address->phone_number ?> 
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
                                                                                                        <button id="<?php echo $address->id ?>" data-address='<?php echo json_encode($address) ?>' @click="editAddress('<?php echo $address->id ?>')" data-bs-toggle="modal" data-bs-target="#addressModal" class="dropdown-item edit-list" data-edit-id="1" href="#">
                                                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> 
                                                                                                            Edit
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="dropdown-divider"></li>
                                                                                                    <li>
                                                                                                        <button @click="deleteAddress('<?php echo $address->id ?>')" class="dropdown-item remove-list">
                                                                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                                            Delete
                                                                                                        </button>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endforeach ?>
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
            <?php include "../../layouts/footer.template.php" ?>
        </div><!-- end main content-->
        <?php include "../../layouts/clientModal.template.php" ?>
        <?php include "../../layouts/addressModal.template.php" ?>
    </div>
    <!-- END layout-wrapper -->
    <?php include "../../layouts/function_footer.template.php" ?>
    
    <?php include "../../layouts/scripts.template.php" ?>
    <!-- swiper js -->
    <script src="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.js"></script>
    <!-- profile init js -->
    <script src="<?= BASE_PATH ?>public/js/pages/profile.init.js"></script>
</body>


</html>