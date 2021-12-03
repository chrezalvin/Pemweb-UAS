<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Management extends CI_Controller {

        public function __construct() {
            parent::__construct();

            // if($this->session->role != 'management') {
            //     redirect(base_url($this->session->role));
            // }

            $this->data['bootstrap'] = $this->load->view('assets/bootstrap', '', TRUE);
            $this->data['jquery'] = $this->load->view('assets/jquery', '', TRUE);
            $this->data['navbar'] = $this->load->view('templates/navbar', [
                'role' => 'user',
                'username' => 'abc'
            ], TRUE);
            $this->load->model('Facility_model');
        }

        public function index() {
            redirect('management/facilities');
        }

        public function facilities()
        {
            $this->data['facilities'] = $this->Facility_model->get_facilities();
            $this->load->view('pages/management/request_listing', $this->data);
        }
    }