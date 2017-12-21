<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $logged_in = $this->session->userdata('logged_in');
        $this->data['login'] = $logged_in['login'];
    }
}