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
                                <h4 class="mb-sm-0">Users</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Users</li>
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
                                                    <button @click="createUser()" data-bs-toggle="modal" data-bs-target="#userModal" class="btn btn-success" id="addUserBtn"><i class="ri-add-line align-bottom me-1"></i> Add User</button>
                                                </div>
                                                <!-- {{usuarios}} -->
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
                                                            <th data-column-id="name" class="gridjs-th gridjs-th-sort text-muted" style="width: 360px;" tabindex="0">
                                                                <div class="gridjs-th-content">Name</div>
                                                            </th>
                                                            <th data-column-id="email" class="gridjs-th gridjs-th-sort text-muted" style="width: 94px;" tabindex="0">
                                                                <div class="gridjs-th-content">Email</div>
                                                            </th>
                                                            <th data-column-id="phone" class="gridjs-th gridjs-th-sort text-muted" style="width: 101px;" tabindex="0">
                                                                <div class="gridjs-th-content">Phone</div>
                                                            </th>
                                                            <th data-column-id="role" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                <div class="gridjs-th-content">Role</div>
                                                            </th>
                                                            <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" style="width: 84px;" tabindex="0">
                                                                <div class="gridjs-th-content">Action</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="gridjs-tbody" v-if="usuarios!=null">
                                                        <tr class="gridjs-tr" v-for="usuario in usuarios">
                                                            <!-- <td>
                                                            {{usuario}}
                                                            </td> -->
                                                            <td data-column-id="name" class="gridjs-td">
                                                                <span>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-3">
                                                                            <div v-if="usuario.avatar!='https://crud.jonathansoto.mx/storage/users/avatars/'" class="avatar-sm bg-light rounded p-1">
                                                                                <img :src="usuario.avatar" alt="" class="img-fluid d-block">
                                                                            </div>
                                                                            <div v-else class="avatar-sm bg-light rounded p-1">
                                                                                <img src="https://media.tenor.com/OXua4v7_uSkAAAAC/profile-picture.gifr" alt="" class="img-fluid d-block">
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <h5 class="fs-14 mb-1">
                                                                                <a :href="'<?= BASE_PATH ?>users/'+usuario.id" class="text-dark">
                                                                                    {{usuario.name}}
                                                                                </a>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                            <td data-column-id="emial" class="gridjs-td">
                                                                {{usuario.email}}
                                                            </td>
                                                            <td data-column-id="phone" class="gridjs-td">
                                                                <span>
                                                                    {{usuario.phone_number}}
                                                                </span>
                                                            </td>
                                                            <td data-column-id="role" class="gridjs-td">
                                                                {{usuario.role}}
                                                            </td>
                                                            <td data-column-id="action" class="gridjs-td">
                                                                <span>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="ri-more-fill"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                            <li>
                                                                                <a class="dropdown-item" :href="'<?= BASE_PATH ?>users/'+usuario.id" >
                                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                    View
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <button :id="usuario.id" :data-product='JSON.stringify(usuario)' v-on:click="editUser(usuario.id)" data-bs-toggle="modal" data-bs-target="#userModal" class="dropdown-item edit-list">
                                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> 
                                                                                    Edit
                                                                                </button>
                                                                            </li>
                                                                            <li class="dropdown-divider"></li>
                                                                            <li>
                                                                                <button v-on:click="deleteUser(usuario.id)" class="dropdown-item edit-list">
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
        <!-- Modal -->
        <?php include "../../layouts/editUserModal.template.php" ?>
    </div>
    <!-- END layout-wrapper -->
    <?php include "../../layouts/function_footer.template.php" ?>
    <?php include "../../layouts/scripts.template.php" ?>

    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <!-- <script src="../../../../unpkg.com/gridjs%405.1.0/plugins/selection/dist/selection.umd.js"></script> -->
    <!-- ecommerce product list -->
    <!-- <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script> -->
    
</body>


</html>