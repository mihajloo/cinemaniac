<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminC
 *
 * @author asus
 */
class AdminC extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Korisnik');
        $this->load->model('Admin');
        $this->load->model('Moderator');
        $this->load->model('Igrac');
        $this->load->model('Vip');
        
        $korisnik = $this->session->userdata('korisnik');
        if($korisnik == null) {
            redirect('Guest');
        }
        
        if($this->Moderator->proveriModeratora($korisnik->regUser->Username)) {
            redirect('ModeratorC');
        }
        
        if($this->Igrac->proveriIgraca($korisnik->regUser->Username)) {
            redirect('IgracC');
        }
        
        if($this->Vip->proveriVipa($korisnik->regUser->Username)) {
            redirect('VipC');
        }
    }
    
    private function prikazi($page, $content = []) {
        $this->load->view($page, $content);
    }
    
    public function index() {
        $this->searchUser();
    }
     public function signout(){
        $this->session->unset_userdata('korisnik');
        redirect("Guest");
    }
    public function deleteModerator(){
         $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
            $this->Moderator->deleteMod($username);
            redirect('AdminC');
        }
       
    }
     public function insertModerator(){
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
           $this->Moderator->insertMod($username);
            redirect('AdminC');
        }
        
    }
    
        public function deleteVIP(){
         $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
            $this->Vip->deleteVip($username);
            redirect('AdminC');
        }
       
    }
     public function insertVIP(){
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
           $this->Vip->insertVip($username);
            redirect('AdminC');
        }
        
    }
    public function searchUser(){
          $this->form_validation->set_rules('srchUser', 'srchUser','required');
          $forma=$this->form_validation->run();
          if($forma) {
              $kljuc=$this->input->post('srchUser');
           $users=$this->Korisnik->searchUserByKey($key);
           }
          
          else $users=$this->Korisnik->dohvatiSveKorisnike();
          foreach($users as $kor){
          if($this->Moderator->proveriModeratora($kor->Username)){
              $kor->isModerator=true;
          }
          else $kor->isModerator=false;
          
          if($this->Vip->proveriVipa($kor->Username)){
              $kor->isVip=true;
          }
          else $kor->isVip=false;
          }
          $poruka['users']=$users;
        
          $this->prikazi('HomePageAdmin.php',$poruka);
         
    }
    public function deleteUser(){
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
            $this->Korisnik->deleteKorisnik($username);
            redirect('AdminC');
        }
       
    }
    
}
