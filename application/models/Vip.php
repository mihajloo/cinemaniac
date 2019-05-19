<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vip
 *
 * @author asus
 */
class Vip extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiVipa($username) {
        return $this->db->where('Username', $username)->get('vip')->row();
    }
    
    public function proveriVipa($username) {
        $vip = $this->db->where('Username', $username)->get('vip')->row();
        if($vip != null) {
            return true;
        } 
        else {
            return false;
        }
    }
}
