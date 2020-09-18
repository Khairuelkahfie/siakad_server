<?php 
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script acces allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Jurusan_api extends RestController{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model', 'Restapi');
    }
    public function index_get()
    {
        $kode_jurusan = $this->get('kode_jurusan');
        if ($kode_jurusan === null) {
            $jurusan = $this->Restapi->ambiljurusan();
        }else{
            $jurusan = $this->Restapi->ambiljurusan($kode_jurusan);
        }
        if ($jurusan) {
            $this->response(
                [
                    'status' => true,
                    'data'  => $jurusan
                ], 200
            );
        }else{
            $this->response(
                [
                    'status' => false,
                    'data' => 'Kode Jurusan Tidak Di temukan'
                ], 404
            );
        }
    }
}

