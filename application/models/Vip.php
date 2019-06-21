<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Vip - klasa koja realizuje upite vezane za tabelu vip
 *
 * @version 1.0
 * @author Milutin Dobricic 0575/2016
 */
class Vip extends CI_Model {
  /**
    * Kreiranje nove instance
    *
    * @return void
    */      
    public function __construct() {
        parent::__construct();
    }
   /**
    * Dohvata vipa sa zadatim usernamemom
    *
    * @param String $username 
    * @return stdClass
    */    
    public function dohvatiVipa($username) {
        return $this->db->where('Username', $username)->get('vip')->row();
    }
 /**
    * Proverava da li postoji igrac sa zadatim usernamemom u tabeli vip
    *
    * @param String $username 
    * @return boolean
    */    
    public function proveriVipa($username) {
        $vip = $this->db->where('Username', $username)->get('vip')->row();
        if($vip != null) {
            return true;
        } 
        else {
            return false;
        }
    }
   /**
    * Brise vipa sa zadatim usernamemom
    *
    * @param String $username 
    * @return void
    */   
    public function deleteVip($username){
        $this->db->where('Username', $username);
        $this->db->delete('vip');
    }
   /**
    * Ubacuje vipa sa zadatim usernamemom
    *
    * @param String $username 
    * @return void
    */    
    public function insertVip($username){
         $this->db->insert('vip', ['Username' =>$username]);
    
    }
}
