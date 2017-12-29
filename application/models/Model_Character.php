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

    function characterTest($id, $character)
    {
        $this->db->select('name');
        $this->db->from('character');
        $this->db->where('id_user', $id);
        $this->db->where('name', $character);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function insert($id)
    {
        //deklaracja danych
        $name = $this->input->post('character');
        $religions = $this->input->post('religions');
        $gender = $this->input->post('gender');
        //$avatar = $this->input->post('avatar');
        $money = ceil(rand(500, 1000) / 100) * 100;

        if ($gender == "K") {
            $attack_own = rand(5, 8);
            $defense_own = rand(6, 12);
            $age = rand(1800, 2200);
        } elseif ($gender == "M") {
            $attack_own = rand(8, 14);
            $defense_own = rand(4, 9);
            $age = rand(1500, 2000);
        }
        $date_add = date('Y-m-d H:i:s');


        //dodanie postaci dla konta
        $data = array(
            'id_user' => $id,
            'name' => $name,
            'gender' => $gender,
            'id_religion' => $religions,
            'money' => $money,
            'attack_own' => $attack_own,
            'defense_own' => $defense_own,
            'age' => $age,
            'date_add' => $date_add
        );
        $this->db->insert('character', $data);

        //dodanie levela na start
        $data = array(
            'id_character' => $id,
            'id_level' => 1
        );
        $this->db->insert('character_level', $data);

        //dodanie plecaka do postaci
        $data = array(
            'id_character' => $id
        );
        $this->db->insert('bag', $data);


        //level, bag osobne tabele
    }


}