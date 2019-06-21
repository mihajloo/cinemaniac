<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Gost - klasa koja realizuje upite vezane za tabelu gost
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016, Milutin Dobricic 0575/2016
 */
class Gost extends CI_Model{
      /**
    * Kreiranje nove instance
    *
    * @return void
    */  
    public function __construct() {
        parent::__construct();
    }
  /**
    * Dohvata poene svih gostiju za zadatu partiju
    *
    * @param int $idPartija
    * @return stdClass[]
    */  
   public function dohvatiRezultate($idPartija){
       $this->db->select('Ime AS Username,BrojPoena');
       $this->db->from('gost');
       $this->db->where('IdPartija',$idPartija);
       return $this->db->get()->result();
   }
  /**
    * Dodaje gosta sa zadatim imenom za zadatu partiju
    *
    * @param String $username, int $idPartija
    * @return int
    */   
   public function dodajGosta($username,$idPartija){
       $this->db->replace("gost",['IdPartija'=>$idPartija,'BrojPoena'=>0,'NaPitanju'=>0]);
       $id = $this->db->insert_id();
       $this->db->set('Ime',$username."#".$id);
       $this->db->where('IdGost',$id);
       $this->db->update('gost');
       return $id;
   }
  /**
    * Dodaje ishod partije za zadatog gosta
    *
    * @param String $outcome, $username
    * @return void
    */    
   public function dodajIshod($outcome,$username){
       $this->db->set('Ishod',$outcome);
       $this->db->where('Ime',$username);
       $this->db->update('gost');
   }
  /**
    * Dodaje poene gostu sa zadatim usernamemom
    *
    * @param String $username,int $brojPoena
    * @return void
    */      
   public function dodajPoene($username,$brojPoena){
        $this->db->set('BrojPoena', 'BrojPoena+'.(int)$brojPoena, FALSE);
        $this->db->where('Ime',$username);
        $this->db->update('gost');
    }
  /**
    * Ubacuje na kom je pitanju zadati gost
    *
    * @param String $Username,int $IdPartija, int $br
    * @return void
    */      
     public function updatePitanjeNa($Username,$IdPartija,$br){
        $this->db->set('NaPitanju', $br);
        
        $this->db->where('Ime',$Username);
        $this->db->update('Gost');
    }
  /**
    * Brise gosta sa zadatim usernamemom
    *
    * @param String $Username
    * @return void
    */       
    public function izbrisiGosta($name){
        $this->db->where('Ime', $name);
        $this->db->delete('gost');
    }
}
