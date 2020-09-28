<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Identifikasi_model extends CI_Model
{
  public function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }
  function multisave($gejala)
  {
    $query = "insert into gejala_konsultasi (Nm_gejala) value ('$gejala')";
    $this->db->query($query);
  }
}
                        
/* End of file mIdentifikasi.php */
