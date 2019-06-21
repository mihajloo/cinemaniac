<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Korisnik - klasa koja realizuje upite vezane za tabelu korisnik
 *
 * @version 1.0
 * @author Nikola Vucenovic 0363/2016
 */
class Korisnik extends CI_Model {
      /**
    * Kreiranje nove instance
    *
    * @return void
    */  
    public function __construct() {
        parent::__construct();
    }
    /**
    * Dohvata korisnika sa zadatim usernamemom
    *
    * @param String $username 
    * @return stdClass
    */    
    public function dohvatiKorisnika($username) {
        return $this->db->where('Username', $username)->get('korisnik')->row();
    }
    /**
    * Dohvata sve korisnike
    *
    *  
    * @return stdClass[]
    */     
    public function dohvatiSveKorisnike(){
         $this->db->select('Username,Password,Email ');
        $this->db->from('korisnik');
        return $this->db->get()->result();
    }
     /**
    * Ubacuje u tabelu korisnik korisnika
    *
    * @param String $username,$password,$email
    * @return void
    */   
    public function ubaciUBazu($username, $password, $email) {
        $data = array(
            'Username' => $username,
            'Password' => $password,
            'Email' => $email
        );

        $this->db->insert('korisnik', $data);
    }
     /**
    * Brise zadatog korisnika
    *
    * @param String $username
    * @return void
    */  
    public function deleteKorisnik($username){
       $this->db->where('Username', $username);
        $this->db->delete('korisnik');
         
        //  $this->Moderator->deleteMod($username);
         //   $this->Vip->deleteVip($username);
          //    $this->Igrac->deleteIgrac($username);
         
    }
}
