<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * MovieInsert - klasa koja realizuje upite vezane za tabelu scena
 *
 * @version 1.0
 * @author Filip Jankovic 0343/2016
 */
class MovieInsert extends CI_Model {
     /**
    * Kreiranje nove instance
    *
    * @return void
    */   
    public function __construct() {
        parent::__construct();
    }
   /**
    * Dohvata film
    *
    * @param int $IdFilm
    * @return stdClass
    */    
    public function dohvatiFilm($IdFilm) {
        return $this->db->where('IdFilm', $IdFilm)->get('film')->row();
    }
     /**
    * Dohvata scenu
    *
    * @param int $IdScena
    * @return stdClass
    */ 
    public function dohvatiScenu($IdScena) {
        return $this->db->where('IdScena', $IdScena)->get('scena')->row();
    }
      /**
    * Dohvata sve scene 
    *
    * 
    * @return stdClass
    */ 
    public function dohvatiScene() {
        $this->db->select('s.IdScena AS IdScena,s.Naziv AS Naziv,f.Naziv AS Film');
        $this->db->from('scena s,film f');
        return $this->db->where('s.IdFilm=f.IdFilm')->get()->result();
    }
    
}
    
