<?php
	include_once "../../app/config.php";
    include "../../app/ProductController.php";
    $pr = new ProductController();
    $product = $pr->getProductBySlug($_GET['slug']);

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
                                <h4 class="mb-sm-0">Product Details</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Product Details</li>
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
                                        <div class="col-xl-4 col-md-8 mx-auto">
                                            <div class="product-img-slider sticky-side-div">
                                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                    <!-- IMAGEN -->
                                                    <div class="img" v-if="(ruta!=product.cover)">
                                                        <img :src="product.cover" alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div class="img" v-else>
                                                        <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-13.png" alt="" class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                                <!-- end swiper thumbnail slide -->
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-xl-8">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>{{product.name}}</h4>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div v-if="product.brand!=null"><a href="#" class="text-primary d-block">{{product.brand.name}}</a></div>
                                                            <div v-else><a class="text-primary d-block">No Brand</a></div>                    
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <button :id="product.id" :data-product="JSON.stringify(product)" v-on:click="editProduct(product.id)" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></button>
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
                                                                    <p class="text-muted mb-1">Price :</p>
                                                                    <div v-if="presentations.length>0">
                                                                        <h5 class="mb-0">${{presentations[0].price[0].amount}}</h5>
                                                                    </div>
                                                                    <div v-else>
                                                                        <h5 class="mb-0">$ 0.00 </h5>
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
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-file-copy-2-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">No. of Orders :</p>
                                                                    <div v-if="presentations.length>0">
                                                                        <h5 class="mb-0">{{presentations[0].orders.length}}</h5>
                                                                    </div>
                                                                    <div v-else>
                                                                        <h5 class="mb-0">0</h5>
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
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-stack-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Available Stocks :</p>
                                                                    <div v-if="presentations.length>0">
                                                                        <h5 class="mb-0">{{presentations[0].stock}}</h5>
                                                                    </div>
                                                                    <div v-else>
                                                                        <h5 class="mb-0">0</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>


                                                <div class="mt-4 text-muted">
                                                    <div class="hstack gap-2 flex-wrap mb-3">
                                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">View features</button>
                                                    </div>
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="card mb-0">
                                                            <div class="card-body">
                                                                {{product.features}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-content mt-5">
                                                    <h5 class="fs-14 mb-3">Product Description :</h5>
                                                    <nav>
                                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Specification</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row" style="width: 200px;">Categories</th>
                                                                            <td v-for="category in product.categories">
                                                                                <a href="#" class="text-primary d-block">{{category.name}}</a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Brand</th>
                                                                            <td v-if="product.brand!=null">
                                                                                <a href="#" class="text-primary d-block">{{product.brand.name}}</a>
                                                                            </td>
                                                                            <td v-else>No Brand</td>                                                                           
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Weight</th>
                                                                            <td v-if="presentations.length>0">{{presentations[0].weight_in_grams}}</td>
                                                                            <td v-else>No Weight</td>   
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                                            <div>
                                                                <h5 class="font-size-16 mb-3">{{product.name}}</h5>
                                                                <div>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>{{product.description}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product-content -->

                                                <div class="product-content mt-5">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">
                                                                        #
                                                                    </th>
                                                                    <th scope="col">
                                                                        Date
                                                                    </th>
                                                                    <th scope="col">
                                                                        Status
                                                                    </th>
                                                                    <th scope="col">
                                                                        Customer
                                                                    </th>
                                                                    <th scope="col">
                                                                        Purchased
                                                                    </th>
                                                                    <th scope="col">
                                                                        Revenue
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#" class="fw-semibold">
                                                                            #VZ2110
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        10 Oct, 14:47
                                                                    </td>
                                                                    <td class="text-success">
                                                                        <i class="ri-checkbox-circle-line fs-17 align-middle"></i> 
                                                                        Paid
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex gap-2 align-items-center">
                                                                            <div class="flex-shrink-0">
                                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle">
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                Jordan Kennedy 
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        Mastering the grid
                                                                    </td>
                                                                    <td>
                                                                        $9.98
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
        <?php include "../../layouts/productModal.template.php" ?>
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
    </script>
    
</body>


</html>