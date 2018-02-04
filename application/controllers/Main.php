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
 * @property Model_Character $Model_Character
 */
class Main extends FrontendController
{
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('Model_User');
        $this->load->model('Model_Character');
    }

    public function index()
    {
        //$data['login'] = $this->login;
        $data['character'] = $this->Model_Character->getCharacterName($this->id);
        $data['logged_in'] = $this->session->userdata('logged_in');
        $data['rank'] = $this->Model_User->rank($this->id);

        $this->load->view('main/head');
        $this->load->view('main/nav', $data);
        $this->load->view('main/section-top');
        $this->load->view('main/section-content');
        $this->load->view('main/footer');
    }


}
