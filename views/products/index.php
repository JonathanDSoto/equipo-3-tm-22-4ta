<?php
	include_once "../../app/config.php";
    include "../../app/BrandController.php";
    include "../../app/TagController.php";
    $brand = new BrandController();
    $brands = $brand->getBrands();
    // var_dump($products);
?> 

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <title>Products</title>
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
                                                    <button @click="createProduct()" data-bs-toggle="modal" data-bs-target="#productModal" class="btn btn-success" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add Product</button>
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
                                                            <th data-column-id="description" class="gridjs-th gridjs-th-sort text-muted" style="width: 94px;" tabindex="0">
                                                                <div class="gridjs-th-content">Description</div>
                                                            </th>
                                                            <th data-column-id="features" class="gridjs-th gridjs-th-sort text-muted" style="width: 101px;" tabindex="0">
                                                                <div class="gridjs-th-content">Features</div>
                                                            </th>
                                                            <th data-column-id="brand" class="gridjs-th gridjs-th-sort text-muted" style="width: 220px;" tabindex="0">
                                                                <div class="gridjs-th-content">Brand</div>
                                                            </th>
                                                            <th data-column-id="action" class="gridjs-th text-muted" style="width: 80px;">
                                                                <div class="gridjs-th-content">Action</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody class="gridjs-tbody" >
                                                            <tr class="gridjs-tr" v-for="product in products">
                                                                <td data-column-id="product" class="gridjs-td">
                                                                    <span>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3" v-if="(product.cover!=null)">
                                                                                <div class="avatar-sm bg-light rounded p-1" v-if="(ruta!=product.cover)">
                                                                                        <img :src="product.cover" alt="" class="img-fluid d-block">
                                                                                </div>
                                                                                <div class="avatar-sm bg-light rounded p-1" v-else>
                                                                                        <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-13.png" alt="" class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-1">
                                                                                    <a :href="'<?= BASE_PATH ?>products/'+product.slug" class="text-dark">
                                                                                        {{product.name}}
                                                                                    </a>
                                                                                </h5>
                                                                                <p class="text-success mb-0">
                                                                                    Category : 
                                                                                    <span class="fw-medium" v-for="category in product.categories">
                                                                                        <strong ><span > • </span>{{category.name}} </strong>
                                                                                    </span>
                                                                                </p>
                                                                                <p class="text-primary mb-0 mt-2">
                                                                                    Tags : 
                                                                                    <span class="fw-medium" v-for="tag in product.tags">
                                                                                        <strong ><span > • </span>{{tag.name}} </strong>
                                                                                    </span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </span>
                                                                </td>
                                                                <td data-column-id="Description" class="gridjs-td">
                                                                    <span>
                                                                        {{product.description}}
                                                                    </span>
                                                                </td>
                                                                <td data-column-id="features" class="gridjs-td">
                                                                    <span>
                                                                        {{product.features}}
                                                                    </span>
                                                                </td>
                                                                <td data-column-id="brand" class="gridjs-td">
                                                                    <span v-if="product.brand!=null">
                                                                        {{product.brand.name}}
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
                                                                                    <a class="dropdown-item" :href="'<?= BASE_PATH ?>products/'+product.slug">
                                                                                        <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <button :id="product.id" :data-product="JSON.stringify(product)" v-on:click="editProduct(product.id)" data-bs-toggle="modal" data-bs-target="#productModal" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit Product</button>
                                                                                </li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li>
                                                                                    <button v-on:click="deleteProduct(product.id)" class="dropdown-item remove-list">
                                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete
                                                                                    </button>
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
    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>
    
</body>


</html>