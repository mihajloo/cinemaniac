<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Korisnik
 *
 * @author asus
 */
class Korisnik extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiKorisnika($username) {
        return $this->db->where('Username', $username)->get('korisnik')->row();
    }
    
    public function ubaciUBazu($username, $password, $email) {
        $data = array(
            'Username' => $username,
            'Password' => $password,
            'Email' => $email
        );

        $this->db->insert('korisnik', $data);
    }
}
