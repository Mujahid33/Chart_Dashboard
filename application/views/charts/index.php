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

        <a href="<?= base_url() ?>maincontroller/jeniskelamin_tambah" class="btn btn-primary mb-4" style="background-color: rgba(13,71,161 ,0.7)">Tambah Data</a>
        <?php
          $i = 0;
          $j = 0;
          $k = 0;
          foreach ($tahunan as $t) {

            if ($t->id_elemen != 9) {
              $tahunDinamis[$k] = $t->tahun;
              $k++;
            } else { }
          }
          foreach ($jk as $data) {
            if ($data->nama_sub != "Sex Ratio") {
              if ($data->nama_sub == "Laki-Laki") {
                $L[$i] = $data->jumlah;
                $i++;
              } else {
                $P[$j] = $data->jumlah;
                $j++;
              }
            }
          }
        ?>
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Jumlah Penduduk menurut Jenis Kelamin</div>
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
                <canvas id="chartTotal" width="180" height="150"></canvas>
              </div>
              <div class="card-footer small text-muted">Data dalam 5 tahun terakhir</div>
            </div>
          </div>
        </div>


        <script>
          var l = [];
          var p = [];
          var tahun = [];
          l = <?php echo json_encode($L) ?>;
          l = l.reverse();
          var potongLaki = l.length - 5;
          l = l.slice(potongLaki);

          p = <?php echo json_encode($P) ?>;
          p = p.reverse();
          var potongPerempuan = p.length - 5;
          p = p.slice(potongPerempuan);

          tahun = <?php echo json_encode($tahunDinamis) ?>;
          tahun = tahun.reverse();

          var total = [];
          for (var i = 0; i < tahun.length; i++) {
            total[i] = parseFloat(l[i]) + parseFloat(p[i]);
            
          }
          let myChart = document.getElementById('myChart').getContext('2d');

          let jkChart = new Chart(myChart, {
            type: 'bar',
            data: {
              labels: tahun,
              datasets: [{
                label: 'Laki-Laki',
                data: l,
                //backgroundColor:'green'
                backgroundColor: 'rgba(25,118,210 ,0.6)',
                borderWidth: 1,
                borderColor: '#777',
                hoverBorderWidth: 2,
                hoverBorderColor: '#000'
              }, {
                label: 'Perempuan',
                data: p,
                //backgroundColor:'green'
                backgroundColor: 'rgba(211,47,47 ,0.6)',
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
