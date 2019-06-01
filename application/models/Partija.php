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
   
    
    public function dohvatiBrojIgraca($idP){
       $this->db->select('BrojIgraca');
       $this->db->from('partija');
       $this->db->where('IdPartija',$idP);
       return $this->db->get()->row()->BrojIgraca;
    }

    public function dohvatiPraznuPartiju(){
       $this->db->select('IdPartija,BrojIgraca');
       $this->db->from('partija');
       $this->db->where('BrojIgraca<>4');
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
       public function dodajIgraca($Username){
           $this->db->trans_start();
           $id = $this->dohvatiPraznuPartiju();
           $this->db->insert('igrao',['Username'=>$Username,'IdPartija'=>$id,'BrojPoena'=>0]);
           $this->db->trans_complete();
           return $id;
           
       }
   
   
}
