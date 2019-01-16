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

    public function login($login, $password)
    {
        //pobranie hash
        $this->db->select('id_user,login,email,password');
        $this->db->from('user');
        $this->db->where('login', $login);
        $this->db->or_where('email', $login);
        // $this->

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $result = $query->result_array();
            $hash = $result['0']['password'];

            if (password_verify($password, $hash)) {
                $value = array(
                    'id_user' => $result['0']['id_user'],
                    'login' => $result['0']['login']
                );
                return $value;
            } else {
                return FALSE;
            }
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
            'email' => $email,
            'recommended' => $recommended,
            'id_rank' => 1,
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

    function loginAndEmailTest($str)
    {
        $this->db->select('login,email');
        $this->db->from('user');
        $this->db->where('login', $str);
        $this->db->or_where('email', $str);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function encrypt_password($password)
    {
        $options = array(
            'cost' => 11,
            'salt' => random_bytes(22),
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function rank($id)
    {
        $this->db->select('id_rank');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $rank = $result['0']['id_rank'];
        }
        return $rank;

    }


}