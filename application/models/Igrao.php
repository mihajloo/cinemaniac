<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Igrao
 *
 * @author Mihajlo
 */
class Igrao extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function dohvatiPartijeNajskorije($username){
        $this->db->select('i.IdPartija AS IdPartija,i.BrojPoena AS BrojPoena,i.Ishod AS Ishod,p.Datum AS Datum');
        $this->db->from('igrao i,partija p');
        $this->db->where('i.Username',$username);
        $this->db->where('i.IdPartija=p.IdPartija');
        return $this->db->order_by('i.IdPartija' ,'DESC')->limit(10)->get()->result();
    }
    
    public function dodajPoene($idPartija,$username,$brojPoena){
        $this->db->set('BrojPoena', 'BrojPoena+'.(int)$brojPoena, FALSE);
        $this->db->where('IdPartija', $idPartija);
        $this->db->where('Username',$username);
        $this->db->update('igrao');
    }
    
    public function dohvatiRezultate($idPartija){
        $this->db->select('BrojPoena,Username');
        $this->db->from('igrao');
        $this->db->where('IdPartija',$idPartija);
        $this->db->order_by('BrojPoena');
        return $this->db->get()->result();
    }
    
    public function dodajIshod($outcome,$idPartija,$Username){
        $this->db->set('Ishod', $outcome);
        $this->db->where('IdPartija', $idPartija);
        $this->db->where('Username',$Username);
        $this->db->update('igrao');
    }
}
