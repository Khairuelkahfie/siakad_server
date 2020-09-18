<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Userlog_api extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Userlog_api_model', 'Restapi');
    }
    // get data userlog
    public function index_get()
    {
        $username = $this->get('username');
        if ($username === null) {
            $user = $this->Restapi->ambiluser();
        } else {
            $user = $this->Restapi->ambiluser($username);
        }

        if ($user) {
            $this->response([
                'status' => true,
                'data' => $user
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Username tidak di temukan'
            ], 404);
        }
    }
    // $keyword = $this->input->post('keyword', true);
    // $this->db->like('nama', $keyword);
    // $this->db->or_like('jurusan', $keyword);
    // $this->db->or_like('nrp', $keyword);
    // $this->db->or_like('email', $keyword);
    // return $this->db->get('mahasiswa')->result_array();
}
