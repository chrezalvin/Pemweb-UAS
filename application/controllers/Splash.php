<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Splash extends CI_Controller {

        public function __construct() {
            parent::__construct();

            if($this->session->role) {
                redirect($this->session->role);
            }

            $this->data['jquery'] = $this->load->view('assets/jquery', '', TRUE);
            $this->data['bootstrap'] = $this->load->view('assets/bootstrap', '', TRUE);
        }

        public function index(){
            $this->load->view('pages/splash', $this->data);
        }
    }