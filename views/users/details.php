<?php
	include_once "../../app/config.php";
?> 
<!DOCTYPE html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <?php include "../../layouts/head.template.php" ?>
  <!-- swiper css -->
  <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.css" />
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
                        <div class="profile-wid-bg">
                                <!-- IMAGEN DE FONDO -->
                            <img src="<?= BASE_PATH ?>public/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                                <!-- IMAGEN DE USUARIO -->
                                    <img src="<?= $user->avatar ?>" alt="user-img" class="img-thumbnail rounded-circle" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-3">
                                    <h3 class="text-white mb-1"><?= $user->name ?></h3>
                                    <p class="text-white-75"><?= $user->role ?></p>
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
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <a href="#" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
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
                                                                        <td class="text-muted"><?=$user->name?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted"><?= $user->email ?></td>
                                                                    </tr>
                                                                    <?php if(isset($user->phone_number)): ?>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                                            <td class="text-muted"><?= $user->phone_number ?></td>
                                                                        </tr>
                                                                    <?php endif ?>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                                        <td class="text-muted">{{date}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
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