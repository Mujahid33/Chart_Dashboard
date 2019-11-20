<section>
    <div id="wrapper">

    <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>jeniskelamin">
                <i class="fas fa-venus-mars fa-fw" ></i>
                <span>Jenis Kelamin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>usia">
                <i class="fas fa-hourglass-half fa-fw"></i>
                <span>Usia</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>pemiliklahan">
                <i class="fas fa-landmark fa-fw"></i>
                <span>Pemilik Lahan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>kabupatenkota">
                <i class="fas fa-city fa-fw"></i>
                <span>Kabupaten / Kota</span></a>
            </li>
        </ul>
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Penduduk</li>
                </ol>

                <!-- Page Content -->
                
                <hr>

                <a href="<?= base_url() ?>kabupatenkota/tambah_data" class="btn btn-primary mb-4" style="background-color: rgba(13,71,161 ,0.7)">Tambah Data</a>
                <?php
                $i = 0; $j = 0; $k = 0; $l = 0; $m = 0; $n = 0;
                foreach ($tahunan as $t) {

                    $tahunDinamis[$n] = $t->tahun;
                    $n++;
                }

                foreach ($kabkot as $data) {
                    if ($data->nama_sub == "Kabupaten Kulon Progo") {
                        $KP[$i] = $data->jumlah;
                        $i++;
                    } else if ($data->nama_sub == "Kabupaten Bantul") {
                        $B[$j] = $data->jumlah;
                        $j++;
                    } else if ($data->nama_sub == "Kabupaten Gunungkidul") {
                        $GK[$k] = $data->jumlah;
                        $k++;
                    } else if ($data->nama_sub == "Kabupaten Sleman") {
                        $S[$l] = $data->jumlah;
                        $l++;
                    } else {
                        $Y[$m] = $data->jumlah;
                        $m++;
                    }
                }
                // var_dump($jk);
                // var_dump($L);
                // var_dump($P);
                // die();
                ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                Jumlah Penduduk menurut Kabupaten / Kota</div>
                            <div class="card-body">
                                <canvas id="myChart" width="400" height="150"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Data dalam 5 tahun terakhir</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-pie"></i>
                                Total Penduduk tiap tahunnya</div>
                            <div class="card-body">
                                <canvas id="chartTotal" width="300" height="300"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Data dalam 5 tahun terakhir</div>
                        </div>
                    </div>
                </div>

                <script>
                
                var kp = [];
                    var b = [];
                    var gk = [];
                    var s = [];
                    var y = [];
                    var tahun = [];


                    kp = <?php echo json_encode($KP) ?>;
                    kp = kp.reverse();
                    var potongKp = kp.length - 5;
                    kp = kp.slice(potongKp);

                    b = <?php echo json_encode($B) ?>;
                    b = b.reverse();
                    var potongB = b.length - 5;
                    b = b.slice(potongB);

                    gk = <?php echo json_encode($GK) ?>;
                    gk = gk.reverse();
                    var potongGk = gk.length - 5;
                    gk = gk.slice(potongGk);

                    s = <?php echo json_encode($S) ?>;
                    s = s.reverse();
                    var potongS = s.length - 5;
                    s = s.slice(potongS);

                    y = <?php echo json_encode($Y) ?>;
                    y = y.reverse();
                    var potongY = y.length - 5;
                    y = y.slice(potongY);

                    tahun = <?php echo json_encode($tahunDinamis) ?>;
                    tahun = tahun.reverse();

                    var total = [];
                    for (var i = 0; i < tahun.length; i++) {
                        total[i] = parseFloat(kp[i]) + parseFloat(b[i]) + parseFloat(gk[i]) + parseFloat(s[i]) + parseFloat(y[i]);
                        console.log(total[i]);
                    }
                    
                    let myChart = document.getElementById('myChart').getContext('2d');
                    let chartTotal = document.getElementById('chartTotal').getContext('2d');

                    let jkChart = new Chart(myChart, {  
                        
                        type: 'bar',
                        data: {
                            labels: tahun,
                            datasets: [{
                                label: 'Kabupaten Kulonprogo',
                                data: kp,
                                //backgroundColor:'green'
                                backgroundColor: 'rgba(211,47,47 ,0.6)',
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 2,
                                hoverBorderColor: '#000'
                            }, {
                                label: 'Kabupaten Bantul',
                                data: b,
                                //backgroundColor:'green'
                                backgroundColor: 'rgba(251,192,45 ,0.6)',
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 2,
                                hoverBorderColor: '#000'
                            }, {
                                label: 'Kabupaten Gunungkidul',
                                data: gk,
                                //backgroundColor:'green'
                                backgroundColor: 'rgba(104,159,56 ,0.6)',
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 2,
                                hoverBorderColor: '#000'
                            }, {
                                label: 'Kabupaten Sleman',
                                data: s,
                                //backgroundColor:'green'
                                backgroundColor: 'rgba(25,118,210 ,0.6)',
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 2,
                                hoverBorderColor: '#000'
                            }, {
                                label: 'Kota Yogyakarta',
                                data: y,
                                //backgroundColor:'green'
                                backgroundColor: 'rgba(93,64,55 ,0.6)',
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 2,
                                hoverBorderColor: '#000'
                            }]
                        },
                        options: {
                            legend: {
                                position: 'right',
                                labels: {
                                fontColor: '#000'
                                }
                            }
                        }
                    })

                    let totalChart = new Chart(chartTotal, {
                        type: 'pie',
                        data: {
                            labels: tahun,
                            datasets: [{
                                label: 'Total Penduduk',
                                data: total,
                                //backgroundColor:'green'
                                backgroundColor: ['rgba(211,47,47 ,0.6)', 'rgba(251,192,45 ,0.6)', 'rgba(104,159,56 ,0.6)', 'rgba(25,118,210 ,0.6)', 'rgba(93,64,55 ,0.6)'],
                                borderWidth: 1,
                                borderColor: '#777',
                                hoverBorderWidth: 2,
                                hoverBorderColor: '#000'
                            }]
                        },
                        options: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    fontColor: '#000'
                                }
                            },
                            layout: {
                                padding: {
                                    left: 25,
                                    right: 25,
                                    bottom: 0,
                                    top: 0
                                }
                            }
                        }
                    })
                </script>

            </div>
        <!-- /.container-fluid -->
</section>
