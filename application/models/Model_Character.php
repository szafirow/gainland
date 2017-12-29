<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2017-12-23
 * Time: 16:42
 */

class Model_Character extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function count_character($login)
    {

        $this->db->select('*');
        $this->db->from('character');
        $this->db->join('user', 'user.id_user = character.id_character');
        $this->db->where('user.login', $login);  //active=1
        $this->db->where('user.active', 1);  //active=1

        $query = $this->db->get();
        $count = $query->num_rows();
        return $count;

    }

    function insert()
    {

    }


}