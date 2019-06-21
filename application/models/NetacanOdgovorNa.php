<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * NetacanOdgovorNa - klasa koja realizuje upite vezane za tabelu netacanodgovorna
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016
 */
class NetacanOdgovorNa extends CI_Model {
  /**
    * Kreiranje nove instance
    *
    * @return void
    */      
    public function __construct() {
        parent::__construct();
    }
    /**
    * Ubacuje relaciju pitanja i odgovora, gde je odgovor netacan na to pitanje
    *
    * @param int $idP,$idO 
    * @return void
    */ 
    public function ubaciNetacanOdgovor($idP,$idO){
        $this->db->insert('netacanodgovorna',['IdPitanje'=>$idP,'IdOdgovor'=>$idO]);
    }
}
