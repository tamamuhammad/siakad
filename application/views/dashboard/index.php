    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header pb-0">
            <div class="container navbar-olive p-3 text-white my-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="m-0" style="font-size: 35pt">DASHBOARD SIAKAD</h1>
                        <h3 class="m-0" style="font-size: 25pt">SMK SYAFI'I AKROM KOTA PEKALONGAN</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row p-3 mb-3 justify-content-center elevation-2" style="align-items: center;">
                    <div class="col-md-3">
                        <img src="<?= base_url('assets/img/') . $user['gambar']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-9 pl-md-5">
                        <h1><?= $user['nama'] ?></h1>
                        <br>
                        <p class="mb-0"><?= $user['alamat'] ?></p>
                        <p class="mb-0"><?= $user['telp'] ?></p>
                    </div>
                </div>
            </div>
        </section>
    </div>