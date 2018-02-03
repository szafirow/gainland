<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-01-28
 * Time: 12:22
 */

class Model_Settings extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    function getLogo()
    {
        //zwrocenie logo
        $this->db->select('i.name');
        $this->db->from('image i');
        $this->db->join('image_type it', 'i.id_image = it.id_image');
        $this->db->where('it.id_type_image', '2');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['name'];
    }

    function getTitle()
    {
        //zwrocenie tytulu
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name', 'title');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['value'];
    }

    function getDescription()
    {
        //zwrocenie opisu
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name', 'description');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['value'];
    }

    function getTags()
    {
        //zwrocenie tagow
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name', 'tags');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['value'];
    }

    public function insert()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $tags = $this->input->post('tags');

        //pobieram obraz z typem logo
        $this->db->select('i.name');
        $this->db->from('image i');
        $this->db->join('image_type it', 'i.id_image = it.id_image');
        $this->db->where('it.id_type_image', '2');

        $query = $this->db->get();
        $result = $query->result_array();


        if (!empty($_FILES['logo']['name'][0])) {
            $path_logo = FCPATH . 'upload/logo/' . $result['0']['name'];
            if (isset($result['0']['name']) && file_exists($path_logo)) {

                echo $path_logo;
                //k1 - usuniecie pliku
                unlink($path_logo);

                //k2 - usuniecie z bazy
                $sql = "DELETE " . $this->db->dbprefix . "image.*," . $this->db->dbprefix . "image_type.* FROM " . $this->db->dbprefix . "image
               JOIN " . $this->db->dbprefix . "image_type
                    ON " . $this->db->dbprefix . "image.id_image = " . $this->db->dbprefix . "image_type.id_image
               WHERE " . $this->db->dbprefix . "image_type.id_type_image = '2' ";
                $this->db->query($sql);

            }

            //zapis obrazka w bazie danych
            $this->upload_file_logo();
        }

        //zapis title w bazie danych
        $data = array(
            'value' => $title
        );
        $this->db->where('name', 'title');
        $this->db->update('settings', $data);


        //zapis description w bazie danych
        $data = array(
            'value' => $description
        );
        $this->db->where('name', 'description');
        $this->db->update('settings', $data);

        //zapis tags w bazie danych
        $tags = implode(',', array_filter(explode(',', $tags)));
        //preg_replace('/,+/', ',', $text);

        $data = array(
            'value' => $tags
        );
        $this->db->where('name', 'tags');
        $this->db->update('settings', $data);

    }

    private function upload_file_logo()
    {
        //upload logo
        if (!empty($_FILES['logo']['name'])) {
            $config['upload_path'] = 'upload/logo';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 250;
            $config['max_height'] = 250;
            $config['file_name'] = md5(uniqid(time()));

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('logo')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
            } else {
                $image = '';
                $this->session->set_flashdata('item', array('message' => $this->upload->display_errors(), 'class' => 'danger'));
                redirect("/admin/settings/");
            }


            //zapis obrazka w bazie
            $data = array(
                'name' => $uploadData['file_name'],
                'date_add' => date('Y-m-d H:i:s')
            );
            $this->db->insert('image', $data);

            $id_image = $this->db->insert_id();

            //zapis typu obrazka
            $data = array(
                'id_image' => $id_image,
                'id_type_image' => 2
            );
            $this->db->insert('image_type', $data);

        }
    }


}