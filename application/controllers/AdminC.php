<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * AdminC - klasa koja realizuje funkcionalnosti vezane za Administratora
 *
 * @version 1.0
 * @author Nikola Vucenovic 0363/2016, Filip Jankovic 0343/2016
 */
class AdminC extends CI_Controller {
     /**
    * Kreiranje nove instance
    *
    * @return void
    */     
    
    public function __construct() {
        parent::__construct();
        

        
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
   /**
    * Sluzi za prikaz stranice
    *
    * @param String $page,stdClass[] $content 
    * @return void
    */ 
    private function prikazi($page, $content = []) {
        $this->load->view($page, $content);
    }
     /**
    * Ucitava pocetnu stranicu
    *
    * @return void
    */     
    public function index() {
        $this->searchUser();
    }
     /**
    * Zatvara sesiju trenutnog korisnika
    *
    * @return void
    */    
     public function signout(){
        $this->session->unset_userdata('korisnik');
        redirect("Guest");
    }
   /**
    * Brise moderatora iz baze
    *
    * @return void
    */ 
    public function deleteModerator(){
         $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
            $this->Moderator->deleteMod($username);
            redirect('AdminC');
        }
       
    }
   /**
    * Ubacuje moderatora u bazu
    *
    * @return void
    */     
     public function insertModerator(){
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
           $this->Moderator->insertMod($username);
            redirect('AdminC');
        }
        
    }
   /**
    * Brise Vipa iz baze
    *
    * @return void
    */   
        public function deleteVIP(){
         $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
            $this->Vip->deleteVip($username);
            redirect('AdminC');
        }
       
    }
       /**
    * Ubacuje Vipa u bazu
    *
    * @return void
    */   
     public function insertVIP(){
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
           $this->Vip->insertVip($username);
            redirect('AdminC');
        }
        
    }
         /**
    * Sluzi za prikaz svih korisnika
    *
    * @return void
    */   
    public function searchUser(){
           $users=$this->Korisnik->dohvatiSveKorisnike();
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
        /**
    * Ubacuje korisnika iz baze
    *
    * @return void
    */     
    public function deleteUser(){
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('user_id');
            $this->Korisnik->deleteKorisnik($username);
            redirect('AdminC');
        }
       
    }
    
}
