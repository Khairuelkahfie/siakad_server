<?php

class Userlog_api_model extends CI_Model
{
    public function ambiluser($username = null)
    {
        if ($username === null) {
            return $this->db->get('userlog')->result_array();
        } else {
            return $this->db->get_where('userlog', ['username' => $username])->result_array();
        }
    }
    public function cariuser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
