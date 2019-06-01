<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author asus
 */
class Admin extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiAdmina($username) {
        return $this->db->where('Username', $username)->get('admin')->row();
    }
    
    public function proveriAdmina($username) {
        $admin = $this->db->where('Username', $username)->get('admin')->row();
        if($admin != null) {
            return true;
        } 
        else {
            return false;
        }
    }
  

}
