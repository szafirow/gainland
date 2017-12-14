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


        /* $this->form_validation->set_rules('username', 'Username', 'trim|required');
         $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_login');
         if ($this->form_validation->run() == false) {
             // $this->load->view('login_view');
         } else {
             redirect(base_url('index.php/home'), 'refresh');
         }*/
    }


    function login($password)
    {
        $username = $this->input->post('username');
        $result = $this->login->login($$username, $password);
        if ($result) {
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
        }
    }


    function register()
    {
        $this->form_validation->set_rules('login_reg', 'Login', 'trim|required|min_length[3]|max_length[20]|callback_checkLogin');
        $this->form_validation->set_rules('email_reg', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password_reg', 'Hasło', 'trim|required|min_length[5]|max_length[20]|callback_checkPass');
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

    function checkLogin()
    {
        $login = $this->input->post('login_reg');

        if ($this->Model_User->loginTest($login) == TRUE) {
            $this->form_validation->set_message('checkLogin', 'Taki Login istnie już w bazie.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function checkPass()
    {
        $password = $this->input->post('password_reg');
        $repeat_password_reg = $this->input->post('repeat_password_reg');

        if ($password != $repeat_password_reg) {
            $this->form_validation->set_message('checkPass', 'Wprowadzone hasła nie są identyczne.');
            return FALSE;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło powinno zawierać co najmniej jedną cyfrę.');
            return FALSE;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło musi zawierać conajmniej jedną literę.');
            return FALSE;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło powinno zawierać co najmniej jedną dużą literę.');
            return FALSE;
        } elseif (!preg_match("#\W+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło powinno zawierać co najmniej jeden symbol.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


}