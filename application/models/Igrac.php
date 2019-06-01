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
    
    public function pobedioPartiju($username,$idP){
        //slucaj kada je draw nije uzet u obzir
        $this->db->select('*');
        $this->db->from('Gost');
        $this->db->where('IdPartija',$idP);
        $this->db->order_by('BrojPoena','desc');
        $maxGost = $this->db->get()->row();
        $this->db->select('i.Username AS Username,i.BrojPoena AS BrojPoena');
        $this->db->from('igrao i,partija p');
        $this->db->where('i.IdPartija',$idP);
        $maxIgrac = $this->db->get()->row();
        if($maxIgrac == NULL){
            return false;
        }
        else{
            if($maxGost == NULL){
                return $maxIgrac->Username == $username;
            }
            if($maxGost->BrojPoena > $maxIgrac->BrojPoena){
                return false;
            }
            return $maxIgrac->Username == $username;
        }
    }
    
    public function dohvatiTop10Igraca(){
        $this->db->select("i.Username AS Username,SUM(ig.BrojPoena) AS Poeni");
        $this->db->from("igrac i,igrao ig");
        $this->db->where("i.Username=ig.Username");
        $this->db->group_by('i.Username');
        
        return $this->db->order_by("SUM(ig.BrojPoena)",'desc')->limit(10)->get()->result();
    }
     public function deleteKorisnik($username){
         $this->db->where('Username', $username);
        $this->db->delete('igrac');
     }
     
     public function updateStatistics($username,$ishod){
        $this->db->set('BrojPartija', 'BrojPartija+1', FALSE);
       if($ishod=="win"){
           $this->db->set('BrojPobeda', 'BrojPobeda+1', FALSE);
       }
       else if($ishod=="lose"){
            $this->db->set('BrojPoraza', 'BrojPoraza+1', FALSE);
       }
        $this->db->where('Username',$username);
        $this->db->update('igrac');
     }
}
