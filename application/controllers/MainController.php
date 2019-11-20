<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('jk_model');
    $this->load->model('usia_model');
    $this->load->model('lahan_model');
    $this->load->model('kabkot_model');
  }

  public function index()
  {
    $data['jk'] = $this->jk_model->all_jk();
    $data['tahunan'] = $this->jk_model->ambil_lima_tahun_terakhir();

    $this->load->view('charts/_part/header', $data);
    $this->load->view('charts/index', $data);
    $this->load->view('charts/_part/footer', $data);
  }

  public function jeniskelamin(){
    $data['jk'] = $this->jk_model->all_jk();
    $data['tahunan'] = $this->jk_model->ambil_lima_tahun_terakhir();

    $this->load->view('charts/_part/header', $data);
    $this->load->view('charts/sub/sub_jk');
    $this->load->view('charts/_part/footer', $data);
  }

  public function jeniskelamin_tambah()
  {
    $this->load->view('charts/_part/header');
    $this->load->view('charts/sub/sub_jk_tambah');
    $this->load->view('charts/_part/footer');
  }

  public function proses_input_jk()
  {
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $jumlahLaki = $this->input->post('jl');
      $jumlahPerempuan = $this->input->post('jp');
      $tahun = $this->input->post('tahun');

      $dataLaki = array(
        'id_elemen' => 1,
        'nama_sub' => 'Laki-Laki',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $jumlahLaki
      );

      $dataPerempuan = array(
        'id_elemen' => 1,
        'nama_sub' => 'Perempuan',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $jumlahPerempuan
      );

      $masukLaki = $this->jk_model->input_data($dataLaki);
      $masukPerempuan = $this->jk_model->input_data($dataPerempuan);

      if ($masukLaki && $masukPerempuan) {
        redirect('/maincontroller/jeniskelamin');
      } else {
        echo "Gagal";
      }
    }
  }

  public function usia(){
    $data['usia'] = $this->usia_model->all_usia();
    $data['tahunan'] = $this->usia_model->ambil_lima_tahun_terakhir();

    $this->load->view('charts/_part/header', $data);
    $this->load->view('charts/sub/sub_usia');
    $this->load->view('charts/_part/footer', $data);
  }

  public function usia_tambah()
  {
    $this->load->view('charts/_part/header');
    $this->load->view('charts/sub/sub_usia_tambah');
    $this->load->view('charts/_part/footer');
  }

  public function proses_input_usia()
  {
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $anak = $this->input->post('anak');
      $dewasa = $this->input->post('dewasa');
      $tua = $this->input->post('tua');
      $tahun = $this->input->post('tahun');

      if ($anak == null) {
        $anak = 0.0;
      }
      if ($dewasa == null) {
        $dewasa = 0.0;
      }
      if ($tua == null) {
        $tua = 0.0;
      }

      $dataAnak = array(
        'id_elemen' => 2,
        'nama_sub' => '0-14 Tahun',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $anak
      );

      $dataDewasa = array(
        'id_elemen' => 2,
        'nama_sub' => '15-64 Tahun',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $dewasa
      );

      $dataTua = array(
        'id_elemen' => 2,
        'nama_sub' => 'di atas 65 Tahun',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $tua
      );

      $masukAnak = $this->usia_model->input_data($dataAnak);
      $masukDewasa = $this->usia_model->input_data($dataDewasa);
      $masukTua = $this->usia_model->input_data($dataTua);

      if ($masukAnak && $masukDewasa && $masukTua) {
        redirect('/maincontroller/usia');
      } else {
        echo "Gagal";
      }
    }
  }

  public function pemiliklahan(){
    $data['lahan'] = $this->lahan_model->all_lahan();
    $data['tahunan'] = $this->lahan_model->ambil_lima_tahun_terakhir();

    $this->load->view('charts/_part/header', $data);
    $this->load->view('charts/sub/sub_pl');
    $this->load->view('charts/_part/footer', $data);
  }

  public function pemiliklahan_tambah()
  {
    $this->load->view('charts/_part/header');
    $this->load->view('charts/sub/sub_pl_tambah');
    $this->load->view('charts/_part/footer');
  }

  public function proses_input_pl()
  {
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $p = $this->input->post('p');
      $np = $this->input->post('np');
      $tahun = $this->input->post('tahun');

      if ($p == null) {
        $p = 0.0;
      }
      if ($np == null) {
        $np = 0.0;
      }

      $dataP = array(
        'id_elemen' => 3,
        'nama_sub' => 'Pertanian',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $p
      );

      $dataNp = array(
        'id_elemen' => 3,
        'nama_sub' => 'Non Pertanian',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $np
      );

      $masukP = $this->usia_model->input_data($dataP);
      $masuknP = $this->usia_model->input_data($dataNp);

      if ($masukP && $masuknP) {
        redirect('/maincontroller/pemiliklahan');
      } else {
        echo "Gagal";
      }
    }
  }

  public function kabupatenkota(){
    $data['kabkot'] = $this->kabkot_model->all_kabkot();
    $data['tahunan'] = $this->kabkot_model->ambil_lima_tahun_terakhir();

    $this->load->view('charts/_part/header', $data);
    $this->load->view('charts/sub/sub_kabkot');
    $this->load->view('charts/_part/footer', $data);
  }

  public function kabupatenkota_tambah()
  {
    $this->load->view('charts/_part/header');
    $this->load->view('charts/sub/sub_kabkot_tambah');
    $this->load->view('charts/_part/footer');
  }

  public function proses_input_kabkot()
  {
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $kp = $this->input->post('kp');
      $bantul = $this->input->post('bantul');
      $gk = $this->input->post('gk');
      $sleman = $this->input->post('sleman');
      $yogya = $this->input->post('yogya');
      $tahun = $this->input->post('tahun');

      $dataKp = array(
        'id_elemen' => 4,
        'nama_sub' => 'Kabupaten Kulon Progo',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $kp
      );

      $dataBantul = array(
        'id_elemen' => 4,
        'nama_sub' => 'Kabupaten Bantul',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $bantul
      );

      $dataGk = array(
        'id_elemen' => 4,
        'nama_sub' => 'Kabupaten Gunungkidul',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $gk
      );

      $dataSleman = array(
        'id_elemen' => 4,
        'nama_sub' => 'Kabupaten Sleman',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $sleman
      );

      $dataYogya = array(
        'id_elemen' => 4,
        'nama_sub' => 'Kota Yogyakarta',
        'tahun' => $tahun,
        'satuan' => 'Orang',
        'jumlah' => $yogya
      );

      $masukKp = $this->usia_model->input_data($dataKp);
      $masukBantul = $this->usia_model->input_data($dataBantul);
      $masukGk = $this->usia_model->input_data($dataGk);
      $masukSleman = $this->usia_model->input_data($dataSleman);
      $masukYogya = $this->usia_model->input_data($dataYogya);

      if ($masukKp && $masukBantul && $masukGk && $masukSleman && $masukYogya) {
        redirect('/maincontroller/kabupatenkota');
      } else {
        echo "Gagal";
      }
    }
  }

}
