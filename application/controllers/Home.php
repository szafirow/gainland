<?php
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
        $this->load->view('home/head.php');
        $this->load->view('home/nav.php');
        $this->load->view('home/header.php');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-capitol.php');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-prolog.php');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-news.php');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-stat.php');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-best.php');
        $this->load->view('home/divider.php');
        $this->load->view('home/section-invitation.php');
        $this->load->view('home/footer.php');

    }


}