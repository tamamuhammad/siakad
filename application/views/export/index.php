<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container mx-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Export Laporan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="<?= base_url('Rxport') ?>">Report</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </section>

        <form action="<?= base_url('report/export') ?>" method="post">
            <section class="filter">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="mr-2">Filter Berdasarkan :</label>
                                    <select class="custom-select w-50 mx-1" name="jurusan" id="jurusan">
                                        <option value="" selected>Pilih Jurusan</option>
                                        <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Tata Busana">Tata Busana</option>
                                        <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                                        <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                                    </select>
                                    <select class="custom-select w-25 mx-1" name="tahun" id="tahun">
                                        <option value="" selected>Pilih Tahun Kelulusan</option>
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
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-10">
                        <div class="col-12 d-flex mb-3">
                            <div class="col-4">
                                <input class="btn btn-success w-100" type="submit" name="excel" value="Export Excel">
                            </div>
                            <div class="col-4">
                                <input class="btn btn-warning w-100" type="submit" name="pdf" value="Export PDF">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->