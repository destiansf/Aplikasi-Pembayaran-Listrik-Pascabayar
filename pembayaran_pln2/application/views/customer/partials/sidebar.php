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
        <a class="nav-link" href="<?= site_url('customer/dashboard_pelanggan') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Pelanggan
    </div>

    <!-- Nav Item - Data Penggunaan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('customer/data_penggunaan') ?>">
            <i class="fas fa-fw fa-bolt"></i>
            <span>Data Penggunaan</span>
        </a>
    </li>

     <!-- Nav Item - Data Tagihan -->
     <li class="nav-item">
        <a class="nav-link" href="<?= site_url('customer/data_tagihan') ?>">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Data Tagihan</span>
        </a>
    </li>

    <!-- Nav Item - Laporan Pembayaran-->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('customer/laporan_pembayaran') ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Data Pembayaran</span>
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
