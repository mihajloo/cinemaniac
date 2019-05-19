<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Igrac
 *
 * @author asus
 */
class Igrac extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiIgraca($username) {
        return $this->db->where('Username', $username)->get('igrac')->row();
    }
    
    public function proveriIgraca($username) {
        $igrac = $this->db->where('Username', $username)->get('igrac')->row();
        if($igrac != null) {
            return true;
        } 
        else {
            return false;
        }
    }
    
    public function ubaciUBazu($username) {
         $this->db->insert('igrac', ['Username' =>$username,'BrojPartija'=>0,'BrojPobeda'=>0,'BrojPoraza'=>0]);
    }
    
    public function dohvatiPartije($username){
        $this->db->select('IdPartija,BrojPoena');
        $this->db->from('igrao');
        $this->db->where('Username',$username);
        return $this->db->get()->result();
    }
}
