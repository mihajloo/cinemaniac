<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegularUser
 *
 * @author Mihajlo
 */
class VipC extends CI_Controller {
     public function __construct() {       
        parent::__construct();
        
        $this->load->model('Korisnik');
        $this->load->model('Admin');
        $this->load->model('Moderator');
        $this->load->model('Igrac');
        $this->load->model('Vip');
        $this->load->model('Partija');
        $korisnik = $this->session->userdata('korisnik');
        if($korisnik == null) {
            redirect('Guest/loginPage');
        }
        
        if($this->Moderator->proveriModeratora($korisnik->regUser->Username)) {
            redirect('ModeratorC');
        }
        
        if($this->Admin->proveriAdmina($korisnik->regUser->Username)) {
            redirect('AdminC');
        }
        
        
    }
    
    private function prikazi($page, $content = []) {
        $this->load->view($page, $content);
    }
    
    public function index() {
        $this->prikazi('HomePageVip.php',['str' =>1]);
    }
    public function signout(){
        $this->session->unset_userdata('korisnik');
        redirect("Guest");
    }
    public function statistics(){
        $korisnik = $this->session->userdata('korisnik');
        $brPartija = $korisnik->igrac->BrojPartija;
        $brPobeda = $korisnik->igrac->BrojPobeda;
        $brPoraza = $korisnik->igrac->BrojPoraza;
        if($brPartija > 0){
            $procenat = $brPobeda/$brPartija;
        }
        else $procenat = 0;
        $poruka['procenat'] = $procenat*100;
        $poruka['brPobeda'] = $brPobeda;
        $poruka['brPoraza'] = $brPoraza;
        $poruka['str'] = 2;
        $sum = 0;
        $dohvatiPartije = $this->Partija->dohvatiPartije($korisnik->regUser->Username);
        foreach($dohvatiPartije as $partija){
           $sum += $partija->BrojPoena;
        }
        if($brPartija > 0)
        $poruka['avg'] = $sum/$brPartija;
        else $poruka['avg'] = 0;
        $this->prikazi('HomePageVip.php',$poruka);
    }
    
    public function matchHistory(){
      $korisnik = $this->session->userdata('korisnik');
      $dohvatiPartije  = $this->Partija->dohvatiPartijeNajskorije($korisnik->regUser->Username);
     $arr = array();
       foreach($dohvatiPartije as $partija){
           $clan = new stdClass();
           $clan->partija = $partija;
            if($this->Igrac->pobedioPartiju($korisnik->regUser->Username,$partija->IdPartija)){
                $clan->pobedio = "win";
            }
            else $clan->pobedio = "lose";
            array_push($arr,$clan);
           
        }
      $poruka['partije'] = $arr;
      $poruka['str'] = 3;
      $this->prikazi('HomePageVip.php',$poruka);
    }
    public function leaderboard(){
        $poruka['igraci'] = $this->Igrac->dohvatiTop10Igraca();
        $poruka['str'] = 4;
        $this->prikazi('HomePageVip.php',$poruka);
    }
    public function showQuestion($idScena){
        $poruka['str'] = 5;
        $poruka['scena'] = $this->MovieInsert->dohvatiScenu($idScena);
        $this->prikazi('HomePageVip.php',$poruka);
    }
    
    public function showInserts(){
        $poruka['str'] = 6;
        $poruka['dohvatiScene'] = $this->MovieInsert->dohvatiScene();
        $this->prikazi('HomePageVip.php',$poruka);
    }
    public function insertQuestion(){
        $this->form_validation->set_rules('q', 'q', 'required');
        $this->form_validation->set_rules('cor', 'cor', 'required');
        $this->form_validation->set_rules('wra1', 'wra1', 'required');
        $this->form_validation->set_rules('wra2', 'wra2', 'required');
        $this->form_validation->set_rules('wra3', 'wra3', 'required');
        $this->form_validation->set_rules('idS', 'idS', 'required');
        if($this->form_validation->run()){
           
            $question = $this->input->post('q');
            $ca = $this->input->post('cor');
            $wa1 = $this->input->post('wra1');
            $wa2 = $this->input->post('wra2');
            $wa3 = $this->input->post('wra3'); 
            $idS = $this->input->post('idS'); 
            $odobreno = 'nije';
            $idCA = $this->Odgovor->insertOdgovor($ca);
            $idWA1 = $this->Odgovor->insertOdgovor($wa1);
            $idWA2 = $this->Odgovor->insertOdgovor($wa2);
            $idWA3 = $this->Odgovor->insertOdgovor($wa3);
            $idQ = $this->Pitanje->insertPitanje($question,$idCA,$idS,$odobreno);
            $this->NetacanOdgovorNa->ubaciNetacanOdgovor($idQ,$idWA1);
            $this->NetacanOdgovorNa->ubaciNetacanOdgovor($idQ,$idWA2);
            $this->NetacanOdgovorNa->ubaciNetacanOdgovor($idQ,$idWA3);
            redirect('VipC');
        }
    }
    public function back(){
        $this->showInserts();
    }
}
