
<div class="layout-width">
	<div class="navbar-header" v-if="usuarioLog!=null">
		<div class="d-flex">
			<!-- LOGO -->
			<div class="navbar-brand-box horizontal-logo">
					<a href="index.html" class="logo logo-dark">
							<span class="logo-sm">
									<img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="22">
							</span>
							<span class="logo-lg">
									<img src="<?= BASE_PATH ?>public/images/logo-dark.png" alt="" height="17">
							</span>
					</a>

					<a href="index.html" class="logo logo-light">
							<span class="logo-sm">
									<img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="22">
							</span>
							<span class="logo-lg">
									<img src="<?= BASE_PATH ?>public/images/logo-light.png" alt="" height="17">
							</span>
					</a>
			</div>
			<!-- Desplegar sidebar -->
			<button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
					<span class="hamburger-icon">
							<span></span>
							<span></span>
							<span></span>
					</span>
			</button>
		</div>

		<div class="d-flex align-items-center">
			<div class="dropdown d-md-none topbar-head-dropdown header-item">
				<div class="flex-1">
					<i class="bx bx-search fs-22"></i>
				</div>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
					<form class="p-3">
							<div class="form-group m-0">
									<div class="input-group">
											<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
											<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
									</div>
							</div>
					</form>
				</div>
			</div>
			<!-- Carrito de compras -->
			<div class="dropdown topbar-head-dropdown ms-1 header-item">
				<a href="" type="button"  class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" aria-haspopup="true" aria-expanded="false">
					<i class='bx bx-shopping-bag fs-22'></i>
				</a>
			</div>
			<div class="dropdown ms-sm-3 header-item topbar-user">
				<button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="d-flex align-items-center">
						<img :src="usuarioLog.avatar" class="me-3 rounded-circle avatar-xs" alt="user-pic">
						<span class="text-start ms-xl-2">									  <!-- Nombre -->
							<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{usuarioLog.name}}</span>
						</span>
					</span>
				</button>
				<div class="dropdown-menu dropdown-menu-end">
					<!-- item-->
					<h6 class="dropdown-header">Welcome {{usuarioLog.name}}</h6>
					<a class="dropdown-item" :href="'<?= BASE_PATH ?>users/'+usuarioLog.id"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="pages-profile-settings.html"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
					<button  v-on:click="logout(usuarioLog.id)" class="dropdown-item"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></button>	
				</div>
			</div>
		</div>
	</div>
</div>