<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(empty($this->session->user_id))
            redirect('login');

        $this->data['jquery'] = $this->load->view('assets/jquery', NULL, TRUE);
        $this->data['bootstrap'] = $this->load->view('assets/bootstrap', NULL, TRUE);
        $this->data['navbar'] = $this->load->view('templates/navbar', [
            'username' => $this->session->username,
            'role' => $this->session->role
        ], TRUE);
    }

    public function index()
    {
        $this->load->view('pages/user/facilities', $this->data);
    }
}