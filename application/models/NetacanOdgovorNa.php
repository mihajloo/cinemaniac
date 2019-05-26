<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NetacanOdgovorNa
 *
 * @author Mihajlo
 */
class NetacanOdgovorNa extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function ubaciNetacanOdgovor($idP,$idO){
        $this->db->insert('netacanodgovorna',['IdPitanje'=>$idP,'IdOdgovor'=>$idO]);
    }
}
