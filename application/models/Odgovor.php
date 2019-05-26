<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Odgovor
 *
 * @author Mihajlo
 */
class Odgovor extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function insertOdgovor($ans){
        $this->db->insert('odgovor',['Tekst'=>$ans]);
        return $this->db->insert_id();
    }
}
