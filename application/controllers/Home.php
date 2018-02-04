<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-13
 * Time: 20:23
 */

/**
 * @property Model_Tour $Model_Tour
 */
class Home extends FrontendController
{
    function __construct()
    {
        parent::__construct();
        $this->Model_Tour->updateTour();
    }

    public function index()
    {
        $data['toEnd'] = $this->Model_Tour->getTourToEnd();
        $data['tourNow'] = $this->Model_Tour->getTourNow();
        $this->load->view('home/head');
        $this->load->view('home/nav');
        $this->load->view('home/menu-header', $data);
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