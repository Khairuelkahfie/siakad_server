<?php 
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script acces allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Dosen_api extends RestController{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model', 'Restapi');
    }
    public function index_get()
    {
        $nidn = $this->get('nidn');
        if ($nidn === null) {
            $dosen = $this->Restapi->ambildosen();
        }else{
            $dosen = $this->Restapi->ambildosen($nidn);
        }
        if ($dosen) {
            $this->response(
                [
                    'status' => true,
                    'data'  => $dosen
                ], 200
            );
        }else{
            $this->response(
                [
                    'status' => false,
                    'data' => 'NIDN Tidak Di temukan'
                ], 404
            );
        }
    }
}





?>