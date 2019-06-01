<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gost
 *
 * @author Mihajlo
 */
class Gost extends CI_Model{
   public function dohvatiRezultate($idPartija){
       $this->db->select('Ime AS Username,BrojPoena');
       $this->db->from('gost');
       $this->db->where('IdPartija',$idPartija);
       return $this->db->get()->result();
   }
}
