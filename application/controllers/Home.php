<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-13
 * Time: 20:23
 */

class Home extends FrontendController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view('home/head');
        $this->load->view('home/nav');
        $this->load->view('home/menu-header');
        $this->load->view('home/divider');
        $this->load->view('home/section-capitol');
        $this->load->view('home/divider');
        $this->load->view('home/section-prolog');
        $this->load->view('home/divider');
        $this->load->view('home/section-news');
        $this->load->view('home/divider');
        $this->load->view('home/section-stat');
        $this->load->view('home/divider');
        $this->load->view('home/section-best');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-invitation');
        $this->load->view('home/footer');

    }


}