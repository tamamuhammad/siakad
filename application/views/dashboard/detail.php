<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Preview <?= $dokumen['nama'] ?></h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/dokumen') ?>">Daftar Dokumen</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/detail') . $dokumen['id'] ?>">Preview <?= $dokumen['nama'] ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <iframe src="<?= substr($dokumen['link'], 0, -16) ?>preview" width="100%" allow="autoplay" style="height: 75vh"></iframe>
        </div>
    </div>
</div>