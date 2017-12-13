<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model $Model
 * @property Test $Test
 */
class Welcome extends BackendController
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Model");
        $this->load->model("Test");
    }

    public function index()
    {

        $this->Model->test();
        $this->Test->abc();

    }


}
