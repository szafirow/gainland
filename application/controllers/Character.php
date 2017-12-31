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
        $this->is_logged_in();
        $this->load->model('Model_Character');
    }

    public function index()
    {
        $data['login'] = $this->login;

        $this->load->view('character/head.php');
        $this->load->view('character/nav.php', $data);
        $this->load->view('character/section-top.php');
        $this->load->view('character/footer.php');
    }

    public function create()
    {
        $this->form_validation->set_rules('character', 'Nazwa postaci', 'trim|required|min_length[3]|max_length[20]|callback_checkName');
        $this->form_validation->set_rules('gender', 'Płeć', 'trim|required');
        $this->form_validation->set_rules('religions', 'Religia', 'trim|required');

        $formSubmit = $this->input->post('action');

        if ($formSubmit == 1) {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));
                redirect("/character/");
            } else {
                $this->Model_Character->insert($this->id);
                redirect("/main");
            }
        }

    }

    function checkName()
    {
        $character = $this->input->post('character');

        if ($this->Model_Character->characterTest($this->id, $character) == TRUE) {
            $this->form_validation->set_message('checkName', 'Nazwa gracza jest zajęta.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


}