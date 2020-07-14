<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Loker</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/loker') ?>">Info Loker</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/detailL') . $loker['id'] ?>">Detail Loker</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile py-0 px-0">
                        <div class="text-center">
                            <img class="img-fluid" src="<?= base_url('assets/img/') . $loker['gambar'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane">
                                <!-- Post -->
                                <strong><i class="fas fa-envelope mr-1"></i> Judul Loker</strong>

                                <p class="text-muted">
                                    <?= $loker['judul'] ?>
                                </p>
                                <hr>
                                <strong><i class="fas fa-envelope mr-1"></i> Deskripsi Loker</strong>

                                <p class="text-muted">
                                    <?= $loker['isi_lowongan'] ?>
                                </p>
                                <hr>
                                <strong><i class="fas fa-envelope mr-1"></i> Tanggal Post</strong>

                                <p class="text-muted">
                                    <?= $loker['tanggal_post'] ?>
                                </p>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>