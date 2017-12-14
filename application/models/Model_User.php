<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-13
 * Time: 22:23
 */

class Model_User extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('login', $username);
        $this->db->where('password', $password);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function register()
    {
        $login = $this->input->post('login_reg');
        $email = $this->input->post('email_reg');
        $password = $this->input->post('password_reg');
        $recommended = $this->input->post('recommended_reg');
        $date_add = date('Y-m-d H:i:s');

        $data = array(
            'id_user' => '',
            'login' => $login,
            'password' => $this->encrypt_password($password),
            'token' => "asdasd3423",
            'email' => $email,
            'recommended' => $recommended,
            'active' => 1,
            'date_add' => $date_add
        );
        $this->db->insert('user', $data);
    }

    /**
     *  Sprawdzanie czy konkretny login istnieje w bazie
     * @param $login
     * @return bool
     */
    function loginTest($login)
    {

        $this->db->select('login');
        $this->db->from('user');
        $this->db->where('login', $login);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*   function rand_token()
       {
           $s = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 0, 10);
           return md5($s);
       }*/

    private function encrypt_password($password)
    {
        $options = array(
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }


}