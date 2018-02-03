<?php

/**
 * @property Model_Settings $Model_Settings
 */
class Settings extends BackendController
{
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('Model_Settings');
    }

    function index()
    {
        $data['logo'] = base_url() . 'upload/logo/' . $this->Model_Settings->getLogo();
        $data['title'] = $this->Model_Settings->getTitle();
        $data['description'] = $this->Model_Settings->getDescription();
        $data['tags'] = $this->Model_Settings->getTags();

        $this->load->view('admin/head');
        $this->load->view('admin/content', $data, FALSE);
        $this->load->view('admin/footer');
    }


    function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|required');


        $formSubmit = $this->input->post('action');

        if ($formSubmit == 1) {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));
                redirect("/admin/settings");
            } else {

                $this->Model_Settings->insert();
                $this->session->set_flashdata('item', array('message' => 'Pomyślnie rekonfigurowano ustawienia strony!', 'class' => 'success'));
                redirect("/admin/settings/");
            }
        }


        //do musu byc insertem wrzucone do bazy lub zudateoane , nie data[title]
        // tylko logo = > this->input inser(logo) lub przeniesc to modelu a tu pusto
        //w vidoku ladowanie z bazy odczytywane selectem
        /*  $data['logo'] = $this->input->post('logo');
          $data['title'] = $this->input->post('title');
          $data['description'] = $this->input->post('description');
          $data['tags'] = $this->input->post('tags');*/


        echo 'test';
    }
}