<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProfilModel extends CI_Model
{


    function tampil_data()
    {
        return $this->db->get('profil');
    }
    function updateData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
                        
/* End of file profilModel.php */
