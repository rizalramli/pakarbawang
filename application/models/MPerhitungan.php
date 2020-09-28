<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MPerhitungan extends CI_Model
{
    public function save_batch_riwayat($data)
    {
        return $this->db->insert_batch('konsultasi', $data);
    }
    public function getWhere($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function getWhereOrderBy($where, $table)
    {
        // SELECT * FROM `konsultasi` ORDER by id_konsultasi DESC LIMIT 1
        $this->db->order_by('id_konsultasi', 'DESC');
        $this->db->last_query();
        return $this->db->get_where($table, $where, 1);
    }
    public function save_batch($data)
    {
        return $this->db->insert_batch('nilai_gejala_user', $data);
    }
}
                        
/* End of file mPerhitungan.php */
