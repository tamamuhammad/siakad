<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Daftar Dokumen</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/dokumen') ?>">Daftar Dokumen</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Dokumen"></div>
        <?php $this->session->unset_userdata('message'); ?>
        <div class="row">
            <div class="col-12">
                <?php if ($user['role'] < 3) : ?>
                    <form action="" method="post" class="form-inline w-100">
                        <a href="<?= base_url('dashboard/tambah') ?>" class="btn btn-info mb-2 mr-2">Buat Dokumen</a>
                    </form>
                <?php endif; ?>
                <div class="card p-3">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Dokumen</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Pembuat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($dokumen as $d) :
                                    foreach ($role as $r) :
                                        if ($r['dokumen'] == $d['id']) :
                                ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $d['nama'] ?></td>
                                                <td><?= $d['jenis'] ?></td>
                                                <td><?= $d['pembuat'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/detail/') . $d['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <?php if ($user['role'] < 3) : ?>
                                                        <a href="<?= base_url('dashboard/edit/') . $d['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="<?= base_url('dashboard/hapus/') . $d['id'] ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                <?php endif;
                                    endforeach;
                                endforeach; ?>
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