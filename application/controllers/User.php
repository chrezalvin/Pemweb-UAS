<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        if(empty($this->session->user_id))
            redirect('login');

        $this->load->model('Facility_model');

        $this->data['jquery'] = $this->load->view('assets/jquery', NULL, TRUE);
        $this->data['bootstrap'] = $this->load->view('assets/bootstrap', NULL, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', [
            'username' => $this->session->username,
            'role' => $this->session->role
        ], TRUE);
    }

    public function index()
    {
        redirect('user/facilities');
    }

    // view facilities listed
    public function facilities()
    {
        $this->data['facilities'] = $this->Facility_model->get_facilities();
        $this->load->view('pages/user/facilities', $this->data);
    }

    // view individual facility (have description)
    public function facility($name)
    {
        $this->data['facility'] = $this->Facility_model->get_facility($name);
        $this->load->view('pages/user/facilities_details', $this->data);
    }

    // make requests to facilities
    public function requests()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Requests_model');

        $this->form_validation->set_rules($this->Requests_model->get_request_rule());
        $this->form_validation->set_rules('end_time', 'End Time', 'required|callback_check_end_time');

        $this->data['facilities'] = $this->Facility_model->get_all_facilities_by_name();
        $this->data['id'] = $this->input->get('id');

        if($this->input->post('submit') && $this->form_validation->run()) {
            if($this->Requests_model->add_request($this->input->post()))
                redirect('user/facilities');
            else
                $this->data['error'] = 'Something went wrong In our database!';
        }
        
        $this->load->view('pages/user/requests', $this->data);
    }

    // check if end time is greater than start time
    public function check_end_time($str)
    {
        $start_time = $this->input->post('start_time');
        $end_time = $str;

        if(strtotime($start_time) > strtotime($end_time)){
            $this->form_validation->set_message('check_end_time', 'End time must be greater than start time');
            return FALSE;
        }
        else
            return TRUE;
    }
}