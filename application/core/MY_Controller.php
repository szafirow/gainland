<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model_Character $Model_Character
 */
class MY_Controller extends CI_Controller
{
    public $login;
    public $id;


    function __construct()
    {
        parent::__construct();
        $logged_in = $this->session->userdata('logged_in');
        if (!empty($logged_in)) {
            $this->login = $logged_in['login'];
            // $this->data['id'] = $logged_in['id_user'];
            $this->id = $logged_in['id_user'];
        }
    }

    function index()
    {

    }

    function is_logged_in()
    {
        $logged_in = $this->session->userdata('logged_in');
        if (empty($logged_in)) {
            show_error('You don\'t have permission to access this page.', 401);
            die();
        } else {
            $this->load->model('Model_Character');
            $count = $this->Model_Character->count_character($logged_in['login']);
            $exploded = explode('/', $_SERVER["REQUEST_URI"]);

            if ($count == 0 && $exploded[2] == "main") {
                show_error('You don\'t have permission to access this page.', 401);
            } elseif ($count == 0) {
                return TRUE;
            }
            if ($count > 0 && $exploded[2] == "main") {
                return TRUE;
            } elseif ($count > 0) {
                show_error('You don\'t have permission to access this page.', 401);
            }


        }
    }

}