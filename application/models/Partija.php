<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partija
 *
 * @author Mihajlo
 */
class Partija extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiPartije($username){
        $this->db->select('IdPartija,BrojPoena');
        $this->db->from('igrao');
        $this->db->where('Username',$username);
        return $this->db->get()->result();
    }
    public function dohvatiPartijeNajskorije($username){
        $this->db->select('i.IdPartija AS IdPartija,i.BrojPoena AS BrojPoena');
        $this->db->from('igrao i,partija p');
        $this->db->where('i.Username',$username);
        $this->db->where('i.IdPartija=p.IdPartija');
        return $this->db->order_by('p.Datum','desc')->limit(10)->get()->result();
    }
   public function brojIgraca($idP){
       $this->db->from('partija p,gost g');
       $this->db->where('p.IdPartija',$idP);
       $gosti = $this->db->where('g.IdPartija=p.IdPartija')->count_all_results();
       $this->db->from('partija p,igrao i');
       $this->db->where('p.IdPartija',$idP);
       $players = $this->db->where('p.IdPartija=i.IdPartija')->count_all_results();
       return $gosti + $players;
   }
}
