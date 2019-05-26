<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieInsert
 *
 * @author Filip
 */
class MovieInsert extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiFilm($IdFilm) {
        return $this->db->where('IdFilm', $IdFilm)->get('film')->row();
    }
    public function dohvatiScenu($IdScena) {
        return $this->db->where('IdScena', $IdScena)->get('scena')->row();
    }
    public function dohvatiScene() {
        $this->db->select('s.IdScena AS IdScena,s.Naziv AS Naziv,f.Naziv AS Film');
        $this->db->from('scena s,film f');
        return $this->db->where('s.IdFilm=f.IdFilm')->get()->result();
    }
    
}
    
