<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        by <b>Muhammad M. T.</b>
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="http://ponpes-smksa.sch.id">SMK Syafi'i Akrom</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min copy.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.js"></script>
<script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        $('.read1').on('click', function() {
            $('.ringkas1').addClass('d-none')
            $('.panjang1').removeClass('d-none')
        })

        $('.short1').on('click', function() {
            $('.panjang1').addClass('d-none')
            $('.ringkas1').removeClass('d-none')
        })

        $('.read2').on('click', function() {
            $('.ringkas2').addClass('d-none')
            $('.panjang2').removeClass('d-none')
        })

        $('.short2').on('click', function() {
            $('.panjang2').addClass('d-none')
            $('.ringkas2').removeClass('d-none')
        })
        // Summernote
        $('#dataTable').DataTable();
        $('.textarea').summernote();
    });
</script>
</body>

</html>