<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-13
 * Time: 20:49
 */

/**
 * @property Model_User $Model_User
 */
class Main extends FrontendController
{
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('Model_User');
    }

    public function index()
    {
        $data['login'] = $this->login;
        $data['logged_in'] = $this->session->userdata('logged_in');
        $data['rank'] = $this->Model_User->rank($this->id);

        $this->load->view('main/head.php');
        $this->load->view('main/nav.php', $data);
        $this->load->view('main/section-top.php');
        $this->load->view('main/section-content.php');
        $this->load->view('main/footer.php');
    }


}
