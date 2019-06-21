<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Admin - klasa koja realizuje upite vezane za tabelu admin
 *
 * @version 1.0
 * @author Milutin Dobricic 0575/2016
 */
class Admin extends CI_Model {
    
       /**
    * Kreiranje nove instance
    *
    * @return void
    */  
    public function __construct() {
        parent::__construct();
    }
  /**
    * Dohvata iz tabele admin red sa zadatim usernamemom  
    *
    * @param String $username  
    * @return stdClass
    */
    public function dohvatiAdmina($username) {
        return $this->db->where('Username', $username)->get('admin')->row();
    }
  /**
    * Proverava da li u tabeli admin postoji red sa zadatim usernamemom  
    *
    * @param String $username  
    * @return boolean
    */    
    public function proveriAdmina($username) {
        $admin = $this->db->where('Username', $username)->get('admin')->row();
        if($admin != null) {
            return true;
        } 
        else {
            return false;
        }
    }
  

}
