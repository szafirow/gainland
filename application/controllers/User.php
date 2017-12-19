<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-13
 * Time: 22:23
 */

/**
 * @property Model_User $Model_User
 * @property Home $Home
 */
class User extends FrontendController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_User');
    }

    public function index()
    {

    }


    function login()
    {
        $this->form_validation->set_rules('login_log', 'Login', 'trim|required|callback_checkLoginLog');
        $this->form_validation->set_rules('password_log', 'Hasło', 'trim|required|callback_checkPasswordLog');

        if ($this->form_validation->run() == FALSE) {
            //nie zalogowany
            $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));
            redirect("/");

        } else {

            $login = $this->input->post('login');
            $password = $this->input->post('password');

            $this->Model_User->login($login, $password);
            $this->session->set_flashdata('item', array('message' => 'Zalogowany!', 'class' => 'success'));
            redirect("/");


            /*  $login = $this->input->post('login');
              $password = $this->input->post('password');

              $result = $this->Model_User->login($login, $password);
              if ($result) {

                  //jestes zalogoany
                  //sprawdz range

                  $sess_array = array();
                  foreach ($result as $row) {
                      $sess_array = $arrayName = array(
                          'id' => $row->id,
                          'login' => $row->login
                      );
                      $this->session->set_userdata('logged_in', $sess_array);
                  }
                  return true;
              } else {
                  $this->form_validation->set_message('login', 'Invalid username or password');
                  return false;
              }*/

        }
    }


    function register()
    {
        $this->form_validation->set_rules('login_reg', 'Login', 'trim|required|min_length[3]|max_length[20]|callback_checkLoginReg');
        $this->form_validation->set_rules('email_reg', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password_reg', 'Hasło', 'trim|required|min_length[5]|max_length[20]|callback_checkPassReg');
        $this->form_validation->set_rules('recommended_reg', 'Polecający', 'trim|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('rules_reg', 'Regulamin', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));
            redirect("/");
        } else {
            $this->Model_User->register();
            $this->session->set_flashdata('item', array('message' => 'Zarejestrowano nowe konto!', 'class' => 'success'));
            redirect("/");
        }

    }

    function checkLoginReg()
    {
        $login = $this->input->post('login_reg');

        if ($this->Model_User->loginTest($login) == TRUE) {
            $this->form_validation->set_message('checkLoginReg', 'Taki Login istnieje już w bazie.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function checkPassReg()
    {
        $password = $this->input->post('password_reg');
        $repeat_password_reg = $this->input->post('repeat_password_reg');

        if ($password != $repeat_password_reg) {
            $this->form_validation->set_message('checkPassReg', 'Wprowadzone hasła nie są identyczne.');
            return FALSE;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $this->form_validation->set_message('checkPassReg', 'Hasło powinno zawierać co najmniej jedną cyfrę.');
            return FALSE;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $this->form_validation->set_message('checkPassReg', 'Hasło musi zawierać conajmniej jedną literę.');
            return FALSE;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $this->form_validation->set_message('checkPassReg', 'Hasło powinno zawierać co najmniej jedną dużą literę.');
            return FALSE;
        } elseif (!preg_match("#\W+#", $password)) {
            $this->form_validation->set_message('checkPassReg', 'Hasło powinno zawierać co najmniej jeden symbol.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function checkLoginLog()
    {
        $str = $this->input->post('login_log');

        if ($this->Model_User->loginAndEmailTest($str) == FALSE) {
            $this->form_validation->set_message('checkLoginLog', 'Taki login nie istnieje w bazie danych.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function checkPasswordLog()
    {
        $login = $this->input->post('login_log');
        $password = $this->input->post('password_log');

        $result = $this->Model_User->login($login, $password);
        if (!$result) {
            $this->form_validation->set_message('checkPasswordLog', 'Wprowadzono błędne hasło.');
            return FALSE;
        } else {
            return TRUE;
        }


    }
}