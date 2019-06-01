<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BiloU
 *
 * @author Mihajlo
 */
class BiloU extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function pitanjeZaPartiju($idPartija,$idPitanje){
        $this->db->insert('bilou',['IdPartija'=>$idPartija,'IdPitanje'=>$idPitanje]);
    }
    public function dohvatiPitanjaZaPartiju($idPartija){
        $this->db->select('p.IdPitanje AS IdPitanje,p.Tekst AS Tekst, s.Naziv AS Naziv');
        $this->db->from('bilou b,pitanje p,scena s');
        $this->db->where('b.IdPartija',$idPartija);
        $this->db->where('b.IdPitanje=p.IdPitanje');
        $this->db->where("p.IdScena=s.IdScena AND p.Odobreno='jeste'");
        return $this->db->order_by('b.IdBilou','asc')->get()->result();
    }
}
