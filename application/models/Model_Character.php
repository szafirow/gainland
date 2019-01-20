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

        $this->db->select('u.login,ch.name');
        $this->db->from('character ch');
        $this->db->join('user u', 'u.id_user = ch.id_user', 'inner');
        $this->db->where('u.login', $login);
        $this->db->where('u.active', 1);  //active=1

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

    public function getCharacterName($id)
    {
        $this->db->select('name');
        $this->db->from('character');
        $this->db->where('id_user', $id);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['name'];

    }


    public function getCharacterInfo()
    {
        $this->db->select('u.login,ch.name');
        $this->db->from('character ch');
        $this->db->join('user u', 'u.id_user = ch.id_user', 'inner');
        $this->db->where('u.active', 1);  //active=1

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
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
        //select pobierajacy id_char
        $this->db->select('id_character');
        $this->db->from('character');
        $this->db->where('id_user', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $id_character = $result['0']['id_character'];


            $data = array(
                'id_character' => $id_character,
                'id_level' => 1
            );
            $this->db->insert('character_level', $data);


            //dodanie plecaka do postaci
            $data = array(
                'id_character' => $id_character
            );
            $this->db->insert('bag', $data);

        }
        $this->upload_file_avatar($id);

    }

    private function upload_file_avatar($id)
    {
        //upload avatara
        if (!empty($_FILES['avatar']['name'])) {
            $config['upload_path'] = 'upload/avatar';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 250;
            $config['max_height'] = 250;
            $config['file_name'] = md5(uniqid(time()));

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('avatar')) {
                $uploadData = $this->upload->data();
                $avatar = $uploadData['file_name'];
            } else {
                $avatar = '';
                $this->session->set_flashdata('item', array('message' => $this->upload->display_errors(), 'class' => 'danger'));
                redirect("/character/");
            }

            //zapis avatara w bazie
            $data = array(
                'name' => $uploadData['file_name'],
                'date_add' => date('Y-m-d H:i:s')
            );
            $this->db->insert('image', $data);

            $id_image = $this->db->insert_id();

            //zapis typu obrazka
            $data = array(
                'id_image' => $id_image,
                'id_type_image' => 1
            );
            $this->db->insert('image_type', $data);

            //przypisanie avatara do użytkownika
            //select pobierajacy id_char
            $this->db->select('id_character');
            $this->db->from('character');
            $this->db->where('id_user', $id);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                $id_character = $result['0']['id_character'];
            }


            $data = array(
                'id_image' => $id_image,
            );
            $this->db->where('id_character', $id_character);
            $this->db->update('character', $data);


        }
    }


}