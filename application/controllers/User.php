<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(empty($this->session->user_id))
            redirect('login');
    }

    public function index()
    {
        $this->load->view('pages/main', $this->data);
    }
}