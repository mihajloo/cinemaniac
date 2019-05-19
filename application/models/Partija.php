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
   
}
