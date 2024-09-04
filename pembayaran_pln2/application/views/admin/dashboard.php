<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php $this->load->view('admin/partials/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-12 mb-4">

                    <!-- Welcome Card -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h2 class="h4 mb-0 text-gray-800">Welcome, <?php echo $username; ?> !</h2>
                            <p class="text-gray-600">Anda Login Sebagai Administrator.</p>
                        </div>
                    </div>

                    <!-- Other Dashboard Content Here -->

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php $this->load->view('admin/partials/footer'); ?>

</div>
<!-- End of Content Wrapper -->
