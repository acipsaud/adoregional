<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-1">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link elevation-1" style="background-color:white;">
    <img src="<?php  echo base_url(); ?>assets/dist/img/AdminLTELogo1.png" alt="AdminLTE Logo" class="brand-image">
    <span class="brand-text font-weight" style="color: #6c757d;">ADO<b> REGIONAL 7</b> </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php  echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color:black;"><?php echo $this->Modauth->current_user()->nama; ?></a>
        <?php echo $this->Modauth->current_user()->witel; ?>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url('dashboard/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard ADO
            </p>
          </a>
        </li>

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-trophy"></i>
						<p>
							Report Progress ADO
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('progressado/'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>by Kategori ADO</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('progressado/witel'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>by Teritory</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('progressado/trend'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Trend & Racing ADO</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
          <a href="<?php echo site_url('detailado/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Detail Data ADO
            </p>
          </a>
        </li>

				<!-- <li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Create Data
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="./index.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Data ADO</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="./index2.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah LOP</p>
							</a>
						</li>
					</ul>
				</li> -->
				<li class="nav-header">Create ADO</li>
        <li class="nav-item">
          <a href="<?php echo site_url('detailado/tambahado'); ?>" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              Create Data ADO
            </p>
          </a>
        </li>
        
        <li class="nav-header">Logout</li>
        <li class="nav-item">
          <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-arrow-circle-left"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
