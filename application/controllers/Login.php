<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->helper('form');

            $this->data['bootstrap'] = $this->load->view('assets/bootstrap', NULL, TRUE);
            $this->data['jquery'] = $this->load->view('assets/jquery', NULL, TRUE);
        }

        public function index(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->login($email, $password);

            if($this->input->method(TRUE) == 'POST')
            {
                if(!empty($user)){
                    $this->session->user_id = $user['user_id'];
                    $this->session->username = $user['username'];
                    $this->session->role = $user['role'];
                    redirect('main');
                }
                else
                    $this->data['error'] = "incorrect email or password";
            }

            $this->load->view('pages/login', $this->data);
        }
    }