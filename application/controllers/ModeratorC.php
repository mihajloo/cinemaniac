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
class ModeratorC extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Korisnik');
        $this->load->model('Admin');
        $this->load->model('Moderator');
        $this->load->model('Igrac');
        $this->load->model('Vip');
        $this->load->model('Pitanje');
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
    
    private function prikazi($page, $content = []) {
        $this->load->view($page, $content);
    }
    
    public function index() {
        $this->prikazi('HomePageModerator.php',['str' =>1]);
    }
    public function signout(){
        $this->session->unset_userdata('korisnik');
        redirect("Guest");
    }
   
    public function back($accept){
        if($accept == 1){
            $this->questionRequests();
        }
        else  $this->questionBase();
   }
    public function editQuestion(){
        $this->form_validation->set_rules('idQ', 'idQ', 'required');
        $this->form_validation->set_rules('q', 'q', 'required');
        $this->form_validation->set_rules('cor', 'cor', 'required');
        $this->form_validation->set_rules('wra1', 'wra1', 'required');
        $this->form_validation->set_rules('wra2', 'wra2', 'required');
        $this->form_validation->set_rules('wra3', 'wra3', 'required');
        $this->form_validation->set_rules('wra1id', 'wra1id', 'required');
        $this->form_validation->set_rules('wra2id', 'wra2id', 'required');
        $this->form_validation->set_rules('wra3id', 'wra3id', 'required');
        if($this->form_validation->run()){
            $idQ = $this->input->post('idQ');
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
       
    }
 public function deleteQuestion(){
        $this->form_validation->set_rules('idQ', 'idQ', 'required');
        if($this->form_validation->run()){
            $idQ = $this->input->post('idQ');
            $this->Pitanje->deletePitanje($idQ);
            redirect('ModeratorC');
        }
       
    }
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
    public function questionRequests(){
      $poruka['dohvatiNeodobrena'] = $this->Pitanje->dohvatiNeodobrena();
      $poruka['str'] = 2;
      $this->prikazi('HomePageModerator.php',$poruka);
    }
    public function questionBase(){
      $poruka['dohvatiOdobrena'] = $this->Pitanje->dohvatiOdobrena();
      $poruka['str'] = 4;
      $this->prikazi('HomePageModerator.php',$poruka);
    }
   
    
}
