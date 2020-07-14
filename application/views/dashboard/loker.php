<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Info Lowongan Pekerjaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/loker') ?>">Info Loker</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Loker"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('dashboard/tambahL') ?>" class="btn btn-info mr-auto">Tambah Loker</a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-hover text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Isi Loker</th>
                                    <th>Tanggal Posting</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($loker as $l) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><img src="<?= base_url('assets/img/loker/') . $l['gambar'] ?>" width="100px"></td>
                                        <td><?= $l['judul'] ?></td>
                                        <td><?= substr($l['isi_lowongan'], 0, 40) ?> ...</td>
                                        <td><?= $l['tanggal_post'] ?></td>
                                        <td>
                                            <a href="<?= base_url('dashboard/detailL/') . $l['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('dashboard/editL/') . $l['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="<?= base_url('dashboard/hapusL/') . $l['id'] ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>