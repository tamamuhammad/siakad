<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        by <b>Muhammad M. T.</b>
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="http://ponpes-smksa.sch.id">SMK Syafi'i Akrom</a>.</strong> All rights
    reserved.
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
<!-- <script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.js"></script>
<script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.textarea').summernote();

        var ctx = document.getElementById("barChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["TKJ", "RPL", "TB", "TKRO", "TBSM"],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $jumlah_tkj = $this->db->get_where('alumni', ['jurusan' => 'Teknik Komputer dan Jaringan'])->num_rows();
                        echo $jumlah_tkj;
                        ?>,
                        <?php
                        $jumlah_rpl = $this->db->get_where('alumni', ['jurusan' => 'Rekayasa Perangkat Lunak'])->num_rows();
                        echo $jumlah_rpl;
                        ?>,
                        <?php
                        $jumlah_tb = $this->db->get_where('alumni', ['jurusan' => 'Tata Busana'])->num_rows();
                        echo $jumlah_tb;
                        ?>,
                        <?php
                        $jumlah_tkro = $this->db->get_where('alumni', ['jurusan' => 'Teknik Kendaraan Ringan Otomotif'])->num_rows();
                        echo $jumlah_tkro;
                        ?>,
                        <?php
                        $jumlah_tbsm = $this->db->get_where('alumni', ['jurusan' => 'Teknik Bisnis Sepeda Motor'])->num_rows();
                        echo $jumlah_tbsm;
                        ?>
                    ],
                    backgroundColor: [
                        'rgb(75, 192, 192)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 206, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(40, 167, 69)'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })

        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: {
                labels: ["Bekerja", "Kuliah", "Wirausaha", "Belum Kerja"],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $bekerja = $this->db->get_where('alumni', ['keg_set_lulus' => 'Bekerja'])->num_rows();
                        echo $bekerja;
                        ?>,
                        <?php
                        $kuliah = $this->db->get_where('alumni', ['keg_set_lulus' => 'Kuliah'])->num_rows();
                        echo $kuliah;
                        ?>,
                        <?php
                        $wirausaha = $this->db->get_where('alumni', ['keg_set_lulus' => 'Wirausaha'])->num_rows();
                        echo $wirausaha;
                        ?>,
                        <?php
                        $pengangguran = $this->db->get_where('alumni', ['keg_set_lulus' => 'Belum Kerja'])->num_rows();
                        echo $pengangguran;
                        ?>
                    ],
                    backgroundColor: [
                        'rgb(216, 27, 96)',
                        'rgb(32, 201, 151)',
                        'rgb(253, 126, 20)',
                        'rgb(108, 117, 125)'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
            }
        })
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaChartData = {
            labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021'],
            datasets: [{
                label: 'Jumlah Alumni',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [
                    <?php
                    $satu = $this->db->get_where('alumni', ['tahun_lulus' => '2015'])->num_rows();
                    echo $satu;
                    ?>,
                    <?php
                    $dua = $this->db->get_where('alumni', ['tahun_lulus' => '2016'])->num_rows();
                    echo $dua;
                    ?>,
                    <?php
                    $tiga = $this->db->get_where('alumni', ['tahun_lulus' => '2017'])->num_rows();
                    echo $tiga;
                    ?>,
                    <?php
                    $empat = $this->db->get_where('alumni', ['tahun_lulus' => '2018'])->num_rows();
                    echo $empat;
                    ?>,
                    <?php
                    $lima = $this->db->get_where('alumni', ['tahun_lulus' => '2019'])->num_rows();
                    echo $lima;
                    ?>,
                    <?php
                    $enam = $this->db->get_where('alumni', ['tahun_lulus' => '2020'])->num_rows();
                    echo $enam;
                    ?>,
                    <?php
                    $tujuh = $this->db->get_where('alumni', ['tahun_lulus' => '2021'])->num_rows();
                    echo $tujuh;
                    ?>
                ]
            }, ]
        }
        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: ["Laki - Laki", "Perempuan"],
            datasets: [{
                label: '',
                data: [
                    <?php
                    $cowo = $this->db->get_where('alumni', ['jenis_kelamin' => 'Laki-Laki'])->num_rows();
                    echo $cowo;
                    ?>,
                    <?php
                    $cewe = $this->db->get_where('alumni', ['jenis_kelamin' => 'Perempuan'])->num_rows();
                    echo $cewe;
                    ?>
                ],
                backgroundColor: [
                    'rgb(61, 153, 112)',
                    'rgb(255, 99, 132)'
                ]
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    });
</script>
</body>

</html>