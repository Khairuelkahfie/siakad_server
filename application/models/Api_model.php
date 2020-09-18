<?php

class Api_model extends CI_Model
{

    public function ambilkrs($nim = null)
    {
        if ($nim === null) {
            return $this->db->get('krs')->result_array();
        }else {
            return $this->db->get_where('krs', ['nim'=> $nim])->result_array();
        }
    }
    public function ambiluser($username = null)
    {
        if ($username === null ) {
            return $this->db->get('userlog')->result_array();
        } else{
            return $this->db->get_where('userlog', ['username' => $username])->result_array();
        }
        
    }
    public function ambilsemester($semester = null)     
    {
        if ($semester === null) {
            return $this->db->get('semester')->result_array();
        } else{
            return $this->db->get_where('semester', ['semester' => $semester])->result_array();
        }
    }
    public function ambilmatakuliah($kodemk = null)
    {
        if ($kodemk === null) {
            return $this->db->get('mata_kuliah')->result_array();
        }else{
            return $this->db->get_where('mata_kuliah', ['kode_mk'=>$kodemk])->result_array();
        }
    }
    public function ambildosen($nidn = null)
    {
        if ($nidn === null) {
            return $this->db->get('dosen')->result_array();
        }else{
            return $this->db->get_where('dosen', ['nidn'=>$nidn])->result_array();
        }
    }
    public function ambilmhs($nim = null)
    {
        if ($nim === null) {
            return $this->db->get('mhs')->result_array();
        }else{
            return $this->db->get_where('mhs', ['nipd'=>$nim])->result_array();
        }
    }
    public function ambiljurusan($kode_jurusan = null)
    {
        if ($kode_jurusan === null) {
            return $this->db->get('jurusan')->result_array();
        }else{
            return $this->db->get_where('jurusan', ['kode_jurusan'=>$kode_jurusan])->result_array();
        }
    }

}