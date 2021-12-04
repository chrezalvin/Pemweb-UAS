<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // Note: Login, Register, and logout are stored in different classes.
    class Logout extends CI_Controller
    {
        public function index()
        {
            session_destroy();
            redirect('/');
        }
    }