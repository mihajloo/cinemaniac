<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * ModeratorC - klasa koja realizuje funkcionalnosti vezane za Moderatora
 *
 * @version 1.0
 * @author Milutin Dobricic 0575/2016
 */
class ModeratorC extends CI_Controller {
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
        
          if($this->Admin->proveriAdmina($korisnik->regUser->Username)) {
            redirect('AdminC');
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
        $this->prikazi('HomePageModerator.php',['str' =>1]);
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
    * Sluzi za vracanje nazad
    *
    * @return void
    */  
    public function back($accept){
        if($accept == 1){
            $this->questionRequests();
        }
        else  $this->questionBase();
   }
   /**
    * Sluzi za proveru unetih podataka za promenu pitanja
    *
    * @param int $accept
    * @return void
    */     
    public function editQuestion($accept){
        $this->form_validation->set_rules('idQ', 'idQ', 'required');
        $this->form_validation->set_rules('wra1id', 'wra1id', 'required');
        $this->form_validation->set_rules('wra2id', 'wra2id', 'required');
        $this->form_validation->set_rules('wra3id', 'wra3id', 'required');
        $idQ = $this->input->post('idQ');
        $wa1id = $this->input->post('wra1id');
        $wa2id = $this->input->post('wra2id');
        $wa3id = $this->input->post('wra3id'); 
        $this->form_validation->set_rules('q', 'Question', 'required|max_length[100]');
        $this->form_validation->set_rules('cor', 'Correct Answer', 'required');
        $this->form_validation->set_rules('wra1', 'Wrong Answer 1', 'required|max_length[100]');
        $this->form_validation->set_rules('wra2', 'Wrong Answer 2', 'required|max_length[100]');
        $this->form_validation->set_rules('wra3', 'Wrong Answer 3', 'required|max_length[100]');
        if($this->form_validation->run()){
       
            $question = $this->input->post('q');
            $ca = $this->input->post('cor');
            $wa1 = $this->input->post('wra1');
            $wa2 = $this->input->post('wra2');
            $wa3 = $this->input->post('wra3'); 
            $wa1id = $this->input->post('wra1id');
            $wa2id = $this->input->post('wra2id');
            $wa3id = $this->input->post('wra3id'); 
            $odobreno = 'jeste';
            $this->Pitanje->updatePitanje($idQ,$question,$ca,$wa1,$wa2,$wa3,$wa1id,$wa2id,$wa3id,$odobreno);
            redirect('ModeratorC');
        }
        else{
            $this->showQuestion($accept, $idQ);
        }
       
    }
    /**
    * Sluzi za brisnnje pitanja
    *
    * 
    * @return void
    */    
 public function deleteQuestion(){
        $this->form_validation->set_rules('idQ', 'idQ', 'required');
        if($this->form_validation->run()){
            $idQ = $this->input->post('idQ');
            $this->Pitanje->deletePitanje($idQ);
            redirect('ModeratorC');
        }
       
    }
    /**
    * Sluzi za prikaz pitanja
    *
    * 
    * @return void
    */      
    public function showQuestion($accept,$pitanjeId){
        $poruka['str'] = 3;
        $poruka['scena'] = $this->Pitanje->dohvScenu($pitanjeId)->Naziv;
        $poruka['question'] = $this->Pitanje->dohvTekst($pitanjeId)->Tekst;
        $poruka['corAns'] = $this->Pitanje->dohvTacan($pitanjeId)->Tekst;
        $poruka['wrAns'] = $this->Pitanje->dohvNetacne($pitanjeId);
        $poruka['idQ'] = $pitanjeId;
        $poruka['accept'] = $accept;
        $this->prikazi('HomePageModerator.php',$poruka);
    }
       /**
    * Sluzi za prikaz neodobrenih pitanja
    *
    * 
    * @return void
    */   
    public function questionRequests(){
      $poruka['dohvatiNeodobrena'] = $this->Pitanje->dohvatiNeodobrena();
      $poruka['str'] = 2;
      $this->prikazi('HomePageModerator.php',$poruka);
    }
       /**
    * Sluzi za prikaz odobrenih pitanja
    *
    * 
    * @return void
    */     
    public function questionBase(){
      $poruka['dohvatiOdobrena'] = $this->Pitanje->dohvatiOdobrena();
      $poruka['str'] = 4;
      $this->prikazi('HomePageModerator.php',$poruka);
    }
   
    
}
