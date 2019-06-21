<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Moderator - klasa koja realizuje upite vezane za tabelu moderator
 *
 * @version 1.0
 * @author Milutin Dobricic 0575/2016
 */
class Moderator extends CI_Model {
      /**
    * Kreiranje nove instance
    *
    * @return void
    */  
    public function __construct() {
        parent::__construct();
    }
   /**
    * Dohvata moderatora sa zadatim usernamemom
    *
    * @param String $username 
    * @return stdClass
    */    
    public function dohvatiModeratora($username) {
        return $this->db->where('Username', $username)->get('moderator')->row();
    }
  /**
    * Proverava da li postoji igrac sa zadatim usernamemom u tabeli moderator
    *
    * @param String $username 
    * @return boolean
    */    
    public function proveriModeratora($username) {
        $mod = $this->db->where('Username', $username)->get('moderator')->row();
        if($mod != null) {
            return true;
        } 
        else {
            return false;
        }
    }
     
   /**
    * Brise moderatora sa zadatim usernamemom
    *
    * @param String $username 
    * @return void
    */      
      
    public function insertMod($username){
         $this->db->insert('moderator', ['Username' =>$username]);
    
    }
     /**
    * Ubacuje moderatora sa zadatim usernamemom
    *
    * @param String $username 
    * @return void
    */    
     public function deleteMod($username){
        $this->db->where('Username', $username);
        $this->db->delete('moderator');
        
    
    }

    
    
}
