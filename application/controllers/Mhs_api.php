<?php 
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Mhs_api extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model', 'Restapi');
    }
    // get data mahasiswa
    public function index_get()
    {
        $nim = $this->get('nipd');
        if ($nim === null) {
            $mhs = $this->Restapi->ambilmhs();
        }else{
            $mhs = $this->Restapi->ambilmhs($nim);
        }
        if ($mhs) {
            $this->response(
                [
                    'status' => true,
                    'data'  =>$mhs
                ], 200
            );
        }else {
            $this->response(
                [
                    'status' =>false,
                    'data' => 'NIM Tidak Ditemukan'
                ], 400
            );
        }
    }

}









?>