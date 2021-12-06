<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="register-box my-5 mx-5" style="width: 100%!important">
                <div class="register-logo">
                    <a href="<?= base_url('admin/signup') ?>">Register <b>Petugas</b></a>
                </div>

                <div class="card mt-5">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Register Account Petugas Baru</p>

                        <form action="<?= base_url('admin/signup'); ?>" method="post" class="row">
                            <div class="col-md-6">
                                <div class="input-group py-2">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="name" name="name" autofocus value="<?= set_value('name') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group py-2">
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group py-2">
                                    <input type="text" class="form-control" placeholder="No. Telepon" id="telp" name="telp" value="<?= set_value('telp') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group py-2">
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-maps"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group py-2">
                                    <select name="role" id="role" class="form-control">
                                        <option value="" selected disabled>-- Pilih Role --</option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group py-2">
                                    <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group py-2">
                                    <input type="password" class="form-control" placeholder="Ulangi password" id="password2" name="password2">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                <div class="row mt-5">
                                    <!-- /.col -->
                                    <div class="col-12 mt-2">
                                        <button type="submit" class="btn btn-success btn-block">Buat Akun</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
            <!-- /.register-box -->
        </div>
    </section>
</div>