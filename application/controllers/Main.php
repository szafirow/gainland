<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-13
 * Time: 20:49
 */

class Main extends FrontendController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('main/head.php');
        $this->load->view('main/nav.php');
        $this->load->view('main/section-top.php');
        $this->load->view('main/section-content.php');
        $this->load->view('main/footer.php');
    }


    public function logout()
    {

    }

}
