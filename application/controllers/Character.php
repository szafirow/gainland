<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-23
 * Time: 15:51
 */


/**
 * @property Model_Character $Model_Character
 */
class Character extends FrontendController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Character');
    }

    public function index()
    {
        $this->load->view('create/head.php');
        $this->load->view('create/nav.php');
        $this->load->view('create/section-top.php');
        $this->load->view('create/footer.php');
    }

    public function create()
    {
        $this->form_validation->set_rules('character', 'Nazwa postaci', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('religions', 'Religia', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (($this->session->flashdata('item'))) {
                $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));

            }
            redirect("/character/");
        } else {
            redirect("/main");
        }
    }


}