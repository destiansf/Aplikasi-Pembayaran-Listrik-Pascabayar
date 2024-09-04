<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-bolt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PLN Pay</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Admin
    </div>

    <!-- Nav Item - Pelanggan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/pelanggan') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <!-- Nav Item - Penggunaan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/penggunaan') ?>">
            <i class="fas fa-fw fa-bolt"></i>
            <span>Penggunaan</span>
        </a>
    </li>

     <!-- Nav Item - Tagihan -->
     <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/tagihan') ?>">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Tagihan</span>
        </a>
    </li>

    <!-- Nav Item - Pembayaran -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/pembayaran') ?>">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Pembayaran</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
