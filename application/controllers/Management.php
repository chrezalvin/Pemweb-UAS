<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Management extends CI_Controller {

        public function __construct() {
            parent::__construct();

            if($this->session->role != 'management') {
                redirect(base_url($this->session->role));
            }

            $this->data['bootstrap'] = $this->load->view('assets/bootstrap', '', TRUE);
            $this->data['jquery'] = $this->load->view('assets/jquery', '', TRUE);
            $this->data['navbar'] = $this->load->view('templates/navbar', [
                'role' => $this->session->role,
                'username' => $this->session->username
            ], TRUE);
            $this->load->model('Facility_model');
            $this->load->model('Requests_model');
        }

        public function index() {
            redirect('management/facilities');
        }

        public function facilities()
        {
            $this->data['facilities'] = $this->Requests_model->get_requests_pending();
            $this->load->view('pages/management/request_manage', $this->data);
        }

        public function requests()
        {
            $this->data['requests'] = $this->Requests_model->get_requests();
            $this->load->view('pages/management/request_listing', $this->data);
        }

        public function approve($id)
        {
            $this->Requests_model->approve_request($id);
            redirect('management/facilities');
        }

        public function reject($id)
        {
            $this->Requests_model->reject_request($id);
            redirect('management/facilities');
        }

    }