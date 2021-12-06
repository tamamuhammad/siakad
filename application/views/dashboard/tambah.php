<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Buat Dokumen</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/dokumen') ?>">Daftar Dokumen</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/tambah') ?>">Buat Dokumen</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Buat Dokumen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= form_open_multipart('dashboard/tambah'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="nama">Nama Dokumen</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan Nama Dokumen" name="nama" id="nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="jenis">Jenis Dokumen</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan Jenis Dokumen" name="jenis" id="jenis">
                                        <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="pembuat">Pembuat Dokumen</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan Pembuat Dokumen" name="pembuat" id="pembuat">
                                        <?= form_error('pembuat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="akses">Akses Dokumen</label>
                                    </div>
                                    <div class="col-sm-6 d-flex" style="justify-content: space-evenly">
                                        <?php foreach ($role as $r) :
                                            if ($r['id'] != 1) :
                                        ?>
                                                <input type="checkbox" class="form-control" name="akses<?= $r['id'] ?>" id="<?= $r['role'] ?>" checked value="<?= $r['id'] ?>">
                                                <label for="<?= $r['role'] ?>"><?= $r['role'] ?></label>
                                        <?php endif;
                                        endforeach; ?>
                                        <?= form_error('akses', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="link">Link Berkas</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control w-100" rows="2" placeholder="Masukkan link berkas" name="link" id="link"></textarea>
                                        <?= form_error('link', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info float-right mx-1" type="submit">Tambah</button>
                                    <a class="btn btn-secondary float-right mx-1" href="<?= base_url('dashboard/dokumen') ?>">Kembali</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>