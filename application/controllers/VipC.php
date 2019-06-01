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
    private function cmp($a, $b){
     if($a->BrojPoena == $b->BrojPoena) return 0;
     else if ($a->BrojPoena > $b->BrojPoena) return -1;
     else return 1;
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
     $dohvatiPartije  = $this->Igrao->dohvatiPartijeNajskorije($korisnik->regUser->Username);
     
      $poruka['partije'] = $dohvatiPartije;
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
        $this->form_validation->set_rules('q', 'Question', 'required|max_length[45]');
        $this->form_validation->set_rules('cor', 'Correct Answer', 'required|max_length[40]');
        $this->form_validation->set_rules('wra1', 'Wrong Answer 1', 'required|max_length[40]');
        $this->form_validation->set_rules('wra2', 'Wrong Answer 2', 'required|max_length[40]');
        $this->form_validation->set_rules('wra3', 'Wrong Answer 3', 'required|max_length[40]');
       $idS = $this->input->post('idS'); 
        if($this->form_validation->run()){
           
            $question = $this->input->post('q');
            $ca = $this->input->post('cor');
            $wa1 = $this->input->post('wra1');
            $wa2 = $this->input->post('wra2');
            $wa3 = $this->input->post('wra3'); 
            
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
        else{
            $this->showQuestion($idS);
        }
    }
    public function back(){
        $this->showInserts();
    }
    public function dohvatiPartiju(){
       $idP = $this->session->userdata('partija');
       $part =$this->Partija->dohvatiBrojIgraca($idP);
       echo $part;
    }
    public function play(){
        $korisnik = $this->session->userdata('korisnik');
         
        $id = $this->Partija->dodajIgraca($korisnik->regUser->Username);
        $this->session->set_userdata('partija',$id);
        $poruka['controller'] = 'VipC';
        $this->prikazi('Waiting.php',$poruka);
    }
    
    public function chooseQuestions(){
        $idP = $this->session->userdata('partija');
        $pitanja = $this->BiloU->dohvatiPitanjaZaPartiju($idP);
        if($pitanja==NULL){
        $pitanja = $this->Pitanje->izaberiPitanja();
        foreach ($pitanja as $pitanje){
            $this->BiloU->pitanjeZaPartiju($idP,$pitanje->IdPitanje);
        }
        }
        $poruka['controller'] = "VipC";
        $this->session->set_userdata('pitanja',$pitanja);
        $this->prikazi('ReadySet.php',$poruka);
       // $this->game(0);
    }
    public function screen321(){
        $poruka['controller'] = "VipC";
        $this->prikazi('Screen321.php',$poruka);
    }
    public function go(){
        $poruka['controller'] = "VipC";
        $this->prikazi('Go.php',$poruka);
    }

    public function questionScreen($br){
        $pitanja = $this->session->userdata('pitanja');
        if($br < count($pitanja)){
        $poruka['br'] = $br;
        $poruka['controller'] = "VipC";
        $this->prikazi('QuestionText.php',$poruka);
        }
        else{
            $this->declareOutcome();
        }
    }
    public function game($br){
        $pitanja = $this->session->userdata('pitanja');
        $poruka['scena'] = $pitanja[$br]->Naziv;
        $poruka['broj'] = $br;
        $poruka['controller'] = "VipC";
        $this->prikazi('Game.php',$poruka);   
    }
   

  
    
    public function declareOutcome(){
       // $this->session->unset_userdata('pitanja');
       // $this->session->unset_userdata('partija');
        $idP = $this->session->userdata('partija');
        $arrayIgrac = $this->Igrao->dohvatiRezultate($idP);
        $arrayGost  = $this->Gost->dohvatiRezultate($idP);
        $results = array_merge($arrayIgrac,$arrayGost);
        usort($results, array($this,'cmp'));
        $outcome = "lose"; 
        //$brPoena = -1;
       $username = $this->session->userdata('korisnik')->regUser->Username;
        foreach ($results as $result){
            
            if($result->Username ==  $username){
                if($result->BrojPoena == $results[0]->BrojPoena){
                    if($results[0]->BrojPoena == $results[1]->BrojPoena){
                        $outcome = "draw";
                        break;
                    }
                    else {
                        $outcome = "win";
                        break;
                    }
                }
                else{
                    break;
                }
            }
        }
        $this->Igrao->dodajIshod($outcome,$idP,$username);
        $this->Igrac->updateStatistics($username,$outcome);
        $poruka['results'] = $results;
        $poruka['outcome'] = $outcome.'1';
        $poruka['controller'] = "VipC";
        $this->prikazi("EndScreen.php",$poruka);
    }

    public function pitanje($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPitanje = $pitanja[$br]->IdPitanje;
        $tacan = $this->Pitanje->dohvTacan($idPitanje);
        $netacni = $this->Pitanje->dohvNetacne($idPitanje);
        $odg1 = rand(0, 3);
        $poruka['pitanje'] = $pitanja[$br]->Tekst;
        $poruka['odgovor'.$odg1] = $tacan->Tekst;
        $poruka['id'.$odg1] = $tacan->IdOdgovor;
        $poruka['br'] = $br;
        $i=0;
        shuffle($netacni);
        $j=0;
        for($i=0;$i<4;$i++){
        if($i == $odg1){continue;}
        $poruka['odgovor'.$i] = $netacni[$j]->Tekst;
        $poruka['id'.$i] = $netacni[$j]->IdOdgovor;
        $j++;
        }
        $poruka['controller'] = "VipC";
        $this->prikazi('Question.php',$poruka);
    }
    public function proveraOdgovora($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPitanje = $pitanja[$br]->IdPitanje;
        $odg =  $this->Pitanje->dohvTacan($idPitanje);
       
        echo $odg->IdOdgovor;
        
    }
    
    public function updatePoints($points){
       $idP = $this->session->userdata('partija');
       $username = $this->session->userdata('korisnik')->regUser->Username;
       $this->Igrao->dodajPoene($idP,$username,$points);
    }
    
    public function likeQuestion($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPitanje = $pitanja[$br]->IdPitanje;
        $this->Pitanje->reactToQuestion($idPitanje,'Likes');
    }
    
    public function dislikeQuestion($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPitanje = $pitanja[$br]->IdPitanje;
        $this->Pitanje->reactToQuestion($idPitanje,'Dislikes');
    }
  
    public function checkResults($br){
        $idP = $this->session->userdata('partija');
        $array = $this->Igrao->dohvatiRezultate($idP);
        $arrayGost  = $this->Gost->dohvatiRezultate($idP);
        $results = array_merge($array,$arrayGost);
        usort($results, array($this,'cmp'));
        $poruka['results'] = $results;
        $poruka['br'] = $br;
        $poruka['controller'] = "VipC";
        $this->prikazi("Points.php",$poruka);              
    }
    private function unsetData(){
        $this->session->unset_userdata('partija');
        $this->session->unset_userdata('pitanja'); 
    }
    public function goToMenu(){
        $this->unsetData();
        redirect('VipC');
    }
 
    public function playAgain(){
        $this->unsetData();
        $this->play();
    }
}
