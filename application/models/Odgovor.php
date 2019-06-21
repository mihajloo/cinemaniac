<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Odgovor - klasa koja realizuje upite vezane za tabelu odgovor
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016
 */
class Odgovor extends CI_Model{
  /**
    * Kreiranje nove instance
    *
    * @return void
    */      
    public function __construct() {
        parent::__construct();
    }
        /**
    * Ubacuje odgovor u tabelu odgovor
    *
    * @param $ans
    * @return void
    */
    public function insertOdgovor($ans){
        $this->db->insert('odgovor',['Tekst'=>$ans]);
        return $this->db->insert_id();
    }
}
