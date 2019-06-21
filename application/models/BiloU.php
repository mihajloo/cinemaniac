<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * BiloU - klasa koja realizuje upite vezane za tabelu bilou
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016
 */
class BiloU extends CI_Model{
    
  /**
    * Kreiranje nove instance
    *
    * @return void
    */    
    public function __construct() {
        parent::__construct();
    }
  /**
    * Ubacuje id pitanja za navedeni id partije
    *
    *@param int $idPartija,$idPitanje 
    * @return void
    */     
    public function pitanjeZaPartiju($idPartija,$idPitanje){
        $this->db->insert('bilou',['IdPartija'=>$idPartija,'IdPitanje'=>$idPitanje]);
    }
  /**
    * Dohvata sva pitanja za trazenu partiju
    *
    *@param int $idPartija 
    * @return stdClass[]
    */    
    public function dohvatiPitanjaZaPartiju($idPartija){
        $this->db->select('p.IdPitanje AS IdPitanje,p.Tekst AS Tekst, s.Naziv AS Naziv');
        $this->db->from('bilou b,pitanje p,scena s');
        $this->db->where('b.IdPartija',$idPartija);
        $this->db->where('b.IdPitanje=p.IdPitanje');
        $this->db->where("p.IdScena=s.IdScena AND p.Odobreno='jeste'");
        return $this->db->order_by('b.IdBilou','asc')->get()->result();
    }
}
