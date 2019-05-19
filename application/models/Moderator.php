<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Moderator
 *
 * @author asus
 */
class Moderator extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiModeratora($username) {
        return $this->db->where('Username', $username)->get('moderator')->row();
    }
    
    public function proveriModeratora($username) {
        $mod = $this->db->where('Username', $username)->get('moderator')->row();
        if($mod != null) {
            return true;
        } 
        else {
            return false;
        }
    }
}
