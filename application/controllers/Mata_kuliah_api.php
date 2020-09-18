<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Mata_kuliah_api extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model', 'Restapi');
        $this->methods['index_get']['limit'] = 1000;
    }
    //get data semester
    public function index_get()
    {
        $mk = $this->get('kode_mk');
        if ($mk === null) {
            $matkul = $this->Restapi->ambilmatakuliah();
        }else{
            $matkul = $this->Restapi->ambilmatakuliah($mk);
        }

        if ($matkul) {
            $this->response (
                [
                    'status' => true,
                    'data' => $matkul
                ], 200
            );
        }else{
            $this->response(
                [
                    'status' => false,
                    'data' => 'Kode Mata Kuliah Tidak Ditemukan'
                ], 404
            );
        }

    }
}