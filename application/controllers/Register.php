<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!empty($this->session->user_id))
            redirect($this->session->role);

        $this->load->model('User_model');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->data['jquery'] = $this->load->view('assets/jquery', NULL, TRUE);
        $this->data['bootstrap'] = $this->load->view('assets/bootstrap', NULL, TRUE);
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->input->post("register") && $this->form_validation->run()) {
            if($this->User_model->register())
                redirect('login');
            else
                $this->data['error'] = "Something went wrong in our database! Plase try again later";
        } 
        $this->load->view('pages/register', $this->data);
    }

    public function email_check($email)
    {
        
        if($this->User_model->email_check($email))
        {
            $this->form_validation->set_message('email_check', 'Email already exists');
            return FALSE;
        }
        else
            return TRUE;
    }
}