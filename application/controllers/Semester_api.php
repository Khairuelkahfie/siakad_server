<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
class Semester_api extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model', 'Restapi');
    }
    //get data semester
    public function index_get()
    {
        $semester = $this->get('semseter');
        if ($semester === null){
            $smtr = $this->Restapi->ambilsemester();
        }else{
            $smtr = $this->Restapi->ambilsemester($semester);
        }

        if ($smtr) {
            $this->response(
                [
                    'status' => true,
                    'data'   => $smtr
                ], 200
            );
        }else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Semester Tidak Ditemukan '
                ], 404
            );
        }
    }
}