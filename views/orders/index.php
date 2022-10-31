<?php
	include_once "../../app/config.php";
    include "../../app/ProductController.php";
    include "../../app/ClientController.php";
    $pr = new ProductController();
    $products = $pr->getProducts();
    $cl = new ClientController();
    $clients = $cl->getClients();
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
                                <h4 class="mb-sm-0">Orders</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Orders</li>
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
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <div class="d-flex">
                                                    <label class="mt-2 me-1">Inicio: </label>
                                                    <input class="form-control me-1" type="date" placeholder="Inicio" name="inicio" id="start" v-model="startDate">
                                                    <label class="mt-2 me-1">Final: </label>
                                                    <input class="form-control" type="date" placeholder="Final" name="fin" id="end" v-model="endDate">
                                                    <button @click="orderByDate()" type="submit" class="ms-1 form-control search btn btn-success"><i class="ri-search-line search-icon"></i> Search</button>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div>
                                                        <button @click="createOrder()" type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#orderModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="sort" data-sort="folio">Folio</th>
                                                        <th class="sort desc" data-sort="is_paid">Is Paid</th>
                                                        <th class="sort" data-sort="name_client">Name Client</th>
                                                        <th class="sort" data-sort="coupon">Coupon</th>
                                                        <th class="sort" data-sort="status">Status</th>
                                                        <th class="sort" data-sort="action">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr v-for="order in orders">
                                                        <td class="folio"><a :href="'<?=BASE_PATH?>orders/'+order.id">{{order.folio}}</a></td>
                                                        <!-- <td class="is_paid text-success">
                                                            <i class="ri-checkbox-circle-line fs-17 align-middle"></i> 
                                                                Paid
                                                        </td> -->
                                                        <td class="text-success" v-if="order.is_paid!=0">
                                                            <i class="ri-checkbox-circle-line fs-17 align-middle"></i> 
                                                            Paid
                                                        </td>
                                                        <td class="text-danger" v-else>
                                                            <i class="ri-forbid-line fs-17 align-middle"></i> 
                                                            Not Paid
                                                        </td>
                                                        <td class="name_client" >
                                                            <div v-if="order.client!=null">
                                                                {{order.client.name}}
                                                            </div>
                                                        </td>
                                                        <td class="coupon" >
                                                            <div v-if="order.coupon!=null">
                                                                <a :href="'<?=BASE_PATH?>coupons/'+order.coupon.id">{{order.coupon.name}}</a>
                                                            </div>
                                                        </td>
                                                        <!-- Estan ordenadas como en la api -->
                                                        <td class="status">
                                                            <span class="badge badge-soft-warning text-uppercase" v-if="order.order_status.name=='Pediente de pago'">Pendiente de pago</span>
                                                            <span class="badge badge-soft-success text-uppercase" v-else-if="order.order_status.name=='Pagada'">Pagada</span>
                                                            <span class="badge badge-soft-success text-uppercase" v-else-if="order.order_status.name=='Enviada'">Enviada</span>
                                                            <span class="badge badge-soft-danger text-uppercase" v-else-if="order.order_status.name=='Abandonado'">Abandonado</span>
                                                            <span class="badge badge-soft-warning text-uppercase" v-else-if="order.order_status.name=='Pendiente de enviar'">Pendiente de enviar</span>
                                                            <span class="badge badge-soft-danger text-uppercase" v-else>Cancelada</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button :id="order.id" :data-order="JSON.stringify(order)" v-on:click="editOrder(order.id)" class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                                                </div>
                                                                <div class="remove">
                                                                    <button v-on:click="deleteOrder(order.id)" class="btn btn-sm btn-danger remove-item-btn">Remove</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                    </lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                                        orders for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer>
                <?php include "../../layouts/footer.template.php" ?>
            </footer>
            <?php include "../../layouts/orderModalEdit.template.php"?>
            <?php include "../../layouts/orderModal.template.php"?>
        </div>
        <!-- end main content-->
        
    </div>
    <!-- END layout-wrapper -->
    <!--end back-to-top-->
    <?php include "../../layouts/function_footer.template.php" ?>
    <?php include "../../layouts/scripts.template.php" ?>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script><script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript" src="<?= BASE_PATH ?>public/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script type="text/javascript" src="<?= BASE_PATH ?>public/libs/flatpickr/flatpickr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- prismjs plugin -->
    <script src="<?= BASE_PATH ?>public/libs/prismjs/prism.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/list.js/list.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- listjs init -->
    <script src="<?= BASE_PATH ?>public/js/pages/listjs.init.js"></script>

    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>


<div style="position: static !important;"></div>
</body>
</html>