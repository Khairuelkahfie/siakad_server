<?php

class Krs_api_model extends CI_Model
{
    public function ambilkrs($nim = null)
    {
        if ($nim === null) {
            return $this->db->get('krs')->result_array();
        }else {
            return $this->db->get_where('krs', ['nim'=> $nim])->result_array();
        }
    }
}