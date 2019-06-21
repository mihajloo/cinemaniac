<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Partija - klasa koja realizuje upite vezane za tabelu partija
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016
 */
class Partija extends CI_Model{
  /**
    * Kreiranje nove instance
    *
    * @return void
    */      
    public function __construct() {
        parent::__construct();
    }
  /**
    * Dohvata sve partije koje igrac nije napustio
    *
    * @param String $username 
    * @return stdClass[]
    */    
    public function dohvatiPartije($username){
        $this->db->select('IdPartija,BrojPoena');
        $this->db->from('igrao');
        $this->db->where('Username',$username);
        $this->db->where("Ishod<>'left'");
        return $this->db->get()->result();
    }
   /**
    * Smanjuje broj igraca zadatoj partiji
    *
    * @param int $idPartija 
    * @return void
    */   
    public function smanjiBrojIgraca($idPartija){
        $this->db->set('BrojIgraca', 'BrojIgraca-'.(int)1, FALSE);
        $this->db->where('IdPartija', $idPartija);
        $this->db->update('partija');
    }
   /**
    * Dohvata broj igraca za zadatu partiju
    *
    * @param int $idPartija 
    * @return stdClass
    */   
    public function dohvatiBrojIgraca($idP){
       $this->db->select('BrojIgraca');
       $this->db->from('partija');
       $this->db->where('IdPartija',$idP);
       return $this->db->get()->row()->BrojIgraca;
    }
   /**
    * Trazi nepopunjenu partiju
    *
    *  
    * @return int
    */   
    public function dohvatiPraznuPartiju(){
       $this->db->select('IdPartija,BrojIgraca');
       $this->db->from('partija');
       $this->db->where('BrojIgraca<4');
       $part = $this->db->get()->row();
       if($part!=null){
           $this->db->where('IdPartija',$part->IdPartija);
           $this->db->update('partija',['BrojIgraca' => ($part->BrojIgraca +1)]);
           return $part->IdPartija;
       }
       else{
           $this->db->insert('partija',['Datum' => date('Y-m-d'),'BrojIgraca'=>1]);
           return $this->db->insert_id();
       }
    }
     /**
    * Dodaje igraca u partiju
    *
    * @param String $Username
    * @return int
    */    
    public function dodajIgraca($Username){
           $this->db->trans_start();
           $id = $this->dohvatiPraznuPartiju();
           $this->db->replace('igrao',['Username'=>$Username,'IdPartija'=>$id,'Ishod'=>'left','BrojPoena'=>0]);
           $this->db->trans_complete();
           return $id;
           
       }
      /**
    * Dohvata broj ljudi koji su odgovorili na pitanje do sada
    *
    * @param int $idPartija,$brPitanja 
    * @return int
    */       
      public function dohvatiBrojOdgovora($idPartija,$brPitanja){
       
        $this->db->select('*');
        $this->db->from('partija p,igrao i');
        $this->db->where('p.IdPartija',$idPartija);
        $this->db->where('p.IdPartija=i.IdPartija');
        $this->db->where('i.NaPitanju >=',$brPitanja);
        $brIgraca = $this->db->count_all_results();
        $this->db->select('*');
        $this->db->from('gost g');
        $this->db->where('g.IdPartija',$idPartija);
        $this->db->where('g.NaPitanju',$brPitanja);
        $brGost = $this->db->count_all_results();
      
        return ($brIgraca + $brGost);
    }
   
}
