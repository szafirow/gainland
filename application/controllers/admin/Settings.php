<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-01-15
 * Time: 18:18
 */

class Settings extends BackendController
{
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
    }

    function index()
    {
        $this->load->view('admin/head');
        $this->load->view('admin/content');
        $this->load->view('admin/footer');
    }
}