<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkot_model extends CI_Model
{
  public function all_kabkot()
  {

    $this->db->select('*')
      ->from('sub_elemen')
      ->order_by('tahun', 'DESC')
      ->where('id_elemen', 4);
    $query = $this->db->get();

    return $query->result();
  }

  public function input_data($data)
  {

    return $this->db->insert('sub_elemen', $data);
  }

  public function ambil_lima_tahun_terakhir()
  {
    $this->db->select('*')
      ->from('sub_elemen')
      ->group_by('tahun')
      ->order_by('tahun', 'DESC')
      ->limit(5)
      ->where('id_elemen', 4);
    $query = $this->db->get();

    return $query->result();
  }
}
