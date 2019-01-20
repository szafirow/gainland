<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-02-04
 * Time: 16:11
 */

class Model_Tour extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function getTourChange()
    {
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name', 'tour_change');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['value'];

    }

    public function getTourNow()
    {
        $this->db->select('value');
        $this->db->from('settings');
        $this->db->where('name', 'tour');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['value'];

    }

    public function getTourToEnd()
    {
        //Zwaraca za ile minut bedzie koniec tury
        $tourChange = $this->getTourChange(); //17:00 -varchar z bazy
        $tourChange_d = date("H:i", strtotime($tourChange)); //17:00 - jako data
        $dateNow = date("H:i", strtotime("now")); //obecna godzina np 18:43

        $firstTime = strtotime($dateNow);
        $lastTime = strtotime($tourChange_d);
        $timeDiff = ($lastTime - $firstTime) / 60;

        return $timeDiff;
    }

    public function updateTour()
    {
        //Zmiana tur o pelnych godzinach

        $tourChange = $this->getTourChange(); //17:00 -varchar z bazy
        $tourChange_d = date("H:i", strtotime($tourChange)); //17:00 - jako data
        $tourChange_h = date("H:i", strtotime($tourChange . '+1 hours'));  //18:00
        $dateNow = date("H:i", strtotime("now")); //obecna godzina np 18:43
        $tourNow = $this->getTourNow(); //5435

        ///echo $dateNow;
        //echo $tourChange_d;
        //zmiana tury nastepuej gdy: jesli godzina teraz >= od godzina +1 z bazy tourChange
        if ($dateNow >= $tourChange_d) {
            echo 'dziala';

            $data = array(
                'value' => $tourChange_h
            );
            $this->db->where('name', 'tour_change');
            $this->db->update('settings', $data);

            $data = array(
                'value' => ($tourNow + 1)
            );
            $this->db->where('name', 'tour');
            $this->db->update('settings', $data);
        }


        // exit();

    }

}