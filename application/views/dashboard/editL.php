<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Loker</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/loker') ?>">Info Loker</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/editL/' . $loker['id']) ?>">Edit Loker</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <?= form_open_multipart('dashboard/editL/' . $loker['id']); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group form-inline">
                            <div class="col-sm-4">
                                <label for="judul">Judul</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control w-100" placeholder="Masukkan judul" name="judul" id="judul" value="<?= $loker['judul'] ?>">
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="col-sm-4">
                                <label for="isi">Deskripsi Loker</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="isi" id="isi"><?= $loker['isi_lowongan'] ?></textarea>
                                <?= form_error('isi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="col-sm-4">
                                <label for="gambar" class="col-form-label">Poster Loker</label>
                            </div>
                            <div class="col-sm-8 px-3">
                                <div class="row">
                                    <div class="custom-file w-75 mr-auto mt-4">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" value="<?= $loker['gambar'] ?>">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                    <img src="<?= base_url('assets/img/') . $loker['gambar'] ?>" width="90px" style="border-radius: 5px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info float-right mx-1" type="submit">Edit</button>
                            <a class="btn btn-secondary float-right mx-1" href="<?= base_url('dashboard/loker') ?>">Kembali</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>