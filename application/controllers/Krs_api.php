<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Krs_api extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Krs_api_model', 'Restapi');
    }
    // get data krs
    public function index_get()
    {
        $nim = $this->get('nim');
        if ($nim === null) {
            $krs = $this->Restapi->ambilkrs();
        } else {
            $krs = $this->Restapi->ambilkrs($nim);
        }
        if ($krs) {
            $this->response( [
                'status' => true,
                'data' => $krs
            ], 200);
        } else {
            $this->response( [
                'status' => false,
                'data' => 'NIM Tidak Ditemukan'
            ], 404);
        }
    }
}