<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail <?= $alumni['nama_alumni'] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/table') ?>">Table Data Alumni</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/table/detail') . $alumni['id'] ?>">Detail <?= $alumni['nama_alumni'] ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/') . $alumni['upload_foto'] ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $alumni['nama_alumni'] ?></h3>

                        <p class="text-muted text-center"><?= $alumni['jurusan'] ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $alumni['jenis_kelamin'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tahun Lulus</b> <a class="float-right"><?= $alumni['tahun_lulus'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Daftar</b> <a class="float-right"><?= $alumni['tanggal_daftar'] ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#tentang" data-toggle="tab">Tentang</a></li>
                            <li class="nav-item"><a class="nav-link" href="#smksa" data-toggle="tab">SMK SA</a></li>
                            <li class="nav-item"><a class="nav-link" href="#lulus" data-toggle="tab">Pasca Lulus</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="tentang">
                                <!-- Post -->
                                <strong><i class="fab fa-facebook mr-1"></i> Social Media</strong>

                                <p class="text-muted">
                                    <?= $alumni['sosmed'] ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                <p class="text-muted"><?= $alumni['alamat'] ?></p>

                                <hr>

                                <strong><i class="fas fa-phone mr-1"></i> No. Telepon</strong>

                                <p class="text-muted">
                                    <?= $alumni['no_telp'] ?>
                                </p>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="smksa">
                                <strong><i class="fas fa-envelope-open-text mr-1"></i> Saran SMKSA</strong>

                                <p class="text-muted">
                                    <?= $alumni['saran_smksa'] ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-star mr-1"></i> Rating SMKSA</strong>

                                <p class="text-muted"><?= $alumni['rating_smksa'] ?></p>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="lulus">
                                <strong><i class="fas fa-briefcase mr-1"></i> Kegiatan Setelah Lulus</strong>

                                <p class="text-muted">
                                    <?= $alumni['keg_set_lulus'] ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-building mr-1"></i> Nama Industri atau Akademi</strong>

                                <p class="text-muted"><?= $alumni['nama_industry'] ?></p>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>