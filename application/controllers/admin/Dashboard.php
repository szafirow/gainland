<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-01-12
 * Time: 18:07
 */

class Dashboard extends BackendController
{
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
    }

    function index()
    {
        $this->load->view('admin/admin.php');
    }

}