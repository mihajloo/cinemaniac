<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Igrao - klasa koja realizuje upite vezane za tabelu igrao
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016
 */
class Igrao extends CI_Model{
     /**
    * Kreiranje nove instance
    *
    * @return void
    */  
    public function __construct() {
        parent::__construct();
    }
     /**
    * Dohvata najskorije partije za zadatog korisnika
    *
    * @param String $username 
    * @return stdClass[]
    */     
    public function dohvatiPartijeNajskorije($username){
        $this->db->select('i.IdPartija AS IdPartija,i.BrojPoena AS BrojPoena,i.Ishod AS Ishod,p.Datum AS Datum');
        $this->db->from('igrao i,partija p');
        $this->db->where('i.Username',$username);
        $this->db->where('i.IdPartija=p.IdPartija');
        return $this->db->order_by('i.IdPartija' ,'DESC')->limit(10)->get()->result();
    }
      /**
    * Dodaje poene korisniku za zadatu partiju
    *
    * @param String $username,int $idPartija, $brojPoena 
    * @return void
    */    
    public function dodajPoene($idPartija,$username,$brojPoena){
        $this->db->set('BrojPoena', 'BrojPoena+'.(int)$brojPoena, FALSE);
        $this->db->where('IdPartija', $idPartija);
        $this->db->where('Username',$username);
        $this->db->update('igrao');
    }
      /**
    * Dohvata rez. svih registrovanih igraca za odredjenu partiju
    *
    * @param int $idPartija 
    * @return stdClass[]
    */     
    public function dohvatiRezultate($idPartija){
        $this->db->select('BrojPoena,Username');
        $this->db->from('igrao');
        $this->db->where('IdPartija',$idPartija);
        $this->db->order_by('BrojPoena');
        return $this->db->get()->result();
    }
  /**
    * Dodaje ishod partije za zadatog igraca
    *
    * @param String $outcome, $username, int $idPartija
    * @return void
    */    
    public function dodajIshod($outcome,$idPartija,$Username){
        $this->db->set('Ishod', $outcome);
        $this->db->where('IdPartija', $idPartija);
        $this->db->where('Username',$Username);
        $this->db->update('igrao');
    }
    /**
    * Ubacuje na kom je pitanju zadati igrac
    *
    * @param String $Username,int $IdPartija, int $br
    * @return void
    */       
    public function updatePitanjeNa($Username,$IdPartija,$br){
        $this->db->set('NaPitanju', $br);
        $this->db->where('IdPartija', $IdPartija);
        $this->db->where('Username',$Username);
        $this->db->update('igrao');
    }
      /**
    * Brise relaciju igrac - partija
    *
    * @param String $Username,int $IdPartija
    * @return void
    */   
    public function izbrisiRelaciju($Username,$IdPartija){
       $this->db->where('IdPartija', $IdPartija);
        $this->db->where('Username',$Username);
        $this->db->delete('igrao');
    }
}
