<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-23
 * Time: 15:51
 */

class Create extends FrontendController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view('create/all.php');
    }
}