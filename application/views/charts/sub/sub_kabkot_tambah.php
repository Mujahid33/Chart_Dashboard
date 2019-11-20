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

        <center>
          <h1>Tambah Data</h1>
        </center>

        <div class="row">

          <div class="col align-self-center mt-5">
            <form action="<?= site_url('maincontroller/proses_input_kabkot'); ?>" method="post">

              <div class="form-group">
                <center>
                  <div class="card" style="width: 28rem;">
                    <div class="card-body">
                      <table>
                        <tr>
                          <td>Kulon Progo</td>
                          <td><input class="form-control mx-sm-3 mb-3" type="number" name="kp" autofocus></td>

                        </tr>
                        <tr>
                          <td>Bantul</td>
                          <td><input class="form-control mx-sm-3 mb-3" type="number" name="bantul"></td>
                        </tr>
                        <tr>
                          <td>Gunungkidul</td>
                          <td><input class="form-control mx-sm-3 mb-3" type="number" name="gk"></td>
                        </tr>
                        <tr>
                          <td>Sleman</td>
                          <td><input class="form-control mx-sm-3 mb-3" type="number" name="sleman"></td>
                        </tr>
                        <tr>
                          <td>Yogyakarta</td>
                          <td><input class="form-control mx-sm-3 mb-3" type="number" name="yogya"></td>
                        </tr>
                        <tr>
                          <td>Tahun</td>
                          <td><input class="form-control mx-sm-3 mb-3" type="number" name="tahun"></td>
                        </tr>

                        <tr>
                          <td></td>
                          <td>
                            <center><button type="submit" class="btn btn-primary" style="background-color: rgba(13,71,161 ,0.7)">Simpan</button></center>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </center>
              </div>

            </form>
          </div>
        </div>
</section>