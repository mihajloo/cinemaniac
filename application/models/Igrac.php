<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Igrac - klasa koja realizuje upite vezane za tabelu igrac
 *
 * @version 1.0
 * @author Milutin Dobricic 0575/2016
 */
class Igrac extends CI_Model {
      /**
    * Kreiranje nove instance
    *
    * @return void
    */  
    public function __construct() {
        parent::__construct();
    }
      /**
    * Dohvata igraca sa zadatim usernamemom
    *
    * @param String $username 
    * @return stdClass
    */      
    public function dohvatiIgraca($username) {
        return $this->db->where('Username', $username)->get('igrac')->row();
    }
  /**
    * Proverava da li postoji igrac sa zadatim usernamemom u tabeli igrac
    *
    * @param String $username 
    * @return boolean
    */    
    public function proveriIgraca($username) {
        $igrac = $this->db->where('Username', $username)->get('igrac')->row();
        if($igrac != null) {
            return true;
        } 
        else {
            return false;
        }
    }
   /**
    * Ubacuje u bazu igraca sa zadatim $usernamemom
    *
    *  
    * @return void
    */    
    public function ubaciUBazu($username) {
         $this->db->insert('igrac', ['Username' =>$username,'BrojPartija'=>0,'BrojPobeda'=>0,'BrojPoraza'=>0]);
    }
    
    /**
    * Dohvata 10 najboljih igraca
    *
    *  
    * @return stdClass[]
    */     
    public function dohvatiTop10Igraca(){
        $this->db->select("i.Username AS Username,SUM(ig.BrojPoena) AS Poeni");
        $this->db->from("igrac i,igrao ig");
        $this->db->where("i.Username=ig.Username");
        $this->db->where("ig.Ishod<>'left'");
        $this->db->group_by('i.Username');
        
        return $this->db->order_by("SUM(ig.BrojPoena)",'desc')->limit(10)->get()->result();
    }
     /**
    * Brise iz tabele igrac zadatog korisnika
    *
    * @param String $username
    * @return void
    */    
     public function deleteKorisnik($username){
         $this->db->where('Username', $username);
        $this->db->delete('igrac');
     }
     /**
    * Updatuje statistiku za zadatog igraca
    *
    * @param String $username,$ishod
    * @return void
    */      
     public function updateStatistics($username,$ishod){
        $this->db->set('BrojPartija', 'BrojPartija+1', FALSE);
       if($ishod=="win"){
           $this->db->set('BrojPobeda', 'BrojPobeda+1', FALSE);
       }
       else if($ishod=="lose"){
            $this->db->set('BrojPoraza', 'BrojPoraza+1', FALSE);
       }
        $this->db->where('Username',$username);
        $this->db->update('igrac');
     }
}
