<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tabel Data Alumni</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/table') ?>">Table Data Alumni</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Formulir Tambah Alumni</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= form_open_multipart('dashboard/tambah'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="nama">Nama</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan Nama" name="nama" id="nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group d-inline-flex custom-control custom-radio">
                                    <div class="custom-control custom-radio mr-1">
                                        <input class="custom-control-input" type="radio" id="laki" name="jeniskelamin" value="Laki-Laki">
                                        <label for="laki" class="custom-control-label">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio ml-1">
                                        <input class="custom-control-input" type="radio" id="perempuan" name="jeniskelamin" value="Perempuan">
                                        <label for="perempuan" class="custom-control-label">Perempuan</label>
                                    </div>
                                    <?= form_error('jeniskelamin', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control w-100" rows="3" placeholder="Masukkan Alamat" name="alamat" id="alamat"></textarea>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="jurusan">Jurusan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="custom-select w-100" name="jurusan" id="jurusan">
                                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="Tata Busana">Tata Busana</option>
                                            <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                                            <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="tahun">Tahun Lulus</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="custom-select mx-1 float-right" name="tahun" id="tahun" style="width : 18%">
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="telp">No Telp.</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan No. Telp" name="telp" id="telp">
                                        <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="sosmed">Sosial Media</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan salah satu akun sosmed" name="sosmed" id="sosmed">
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="custom-select w-100" name="status" id="status">
                                            <option value="Belum Kerja">Belum Kerja</option>
                                            <option value="Bekerja">Bekerja</option>
                                            <option value="Kuliah">Kuliah</option>
                                            <option value="Wirausaha">Wirausaha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="industri">Industri</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan industri" name="industri" id="industri">
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="gambar" class="col-form-label">Gambar</label>
                                    </div>
                                    <div class="col-sm-8 px-3">
                                        <div class="row">
                                            <div class="custom-file w-75 mr-auto mt-4">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>
                                            <img src="<?= base_url('assets/img/default.jpg') ?>" width="90px" style="border-radius: 5px">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="rating">Rating SMKSA</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan rating" name="rating" id="rating">
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="saran">Saran SMKSA</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" placeholder="Masukkan saran" name="saran" id="saran">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info float-right mx-1" type="submit">Tambah</button>
                                    <a class="btn btn-secondary float-right mx-1" href="<?= base_url('dashboard/table') ?>">Kembali</a>
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