<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    // Note: Login, Register, and logout are stored in different classes.
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
            $this->data['recaptcha_site_key'] = $this->config->item('recaptcha_sitekey');
            $this->data['recaptcha_secret_key'] = $this->config->item('recaptcha_secretkey');
        }

        // page for /register
        public function index() {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required|callback_check_recaptcha_response');

            // change error message to bootstrap error message
            $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

            if ($this->input->post("register") && $this->form_validation->run()) {
                if($this->User_model->register())
                    redirect('login');
                else
                    $this->data['error'] = "Something went wrong in our database! Plase try again later";
            } 
            $this->load->view('pages/register', $this->data);
        }

        // callback on form validation, checking if email is correct and not already taken
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

        public function check_recaptcha_response($string)
        {
            $recaptcha_response = $this->input->post('g-recaptcha-response');
            $recaptcha_secret = $this->data['recaptcha_secret_key'];
            $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response";
            $recaptcha_data = file_get_contents($recaptcha_url);
            $recaptcha_result = json_decode($recaptcha_data);
            if($recaptcha_result->success)
                return TRUE;
            else
            {
                $this->form_validation->set_message('check_recaptcha_response', 'This ReCaptcha wasn\'t clicked! To check if you\'re human, please click the ReCaptcha.');
                return FALSE;
            }
        }
    }