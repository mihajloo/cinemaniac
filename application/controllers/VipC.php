<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * VipC - klasa koja realizuje funkcionalnosti vezane za Vip korisnika (igraca)
 *
 * @version 1.0
 * @author Nikola Vucenovic 0363/2016, Filip Jankovic 0343/2016
 */
class VipC extends CI_Controller {
   /**
    * Kreiranje nove instance
    *
    * @return void
    */   
     public function __construct() {       
        parent::__construct();

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
    /**
    * Definise nacin kako da se sortira niz koji se kasnije koristi
    *
    * @param stdClass $a,$b 
    * @return int
    */       
    private function cmp($a, $b){
     if($a->BrojPoena == $b->BrojPoena) return 0;
     else if ($a->BrojPoena > $b->BrojPoena) return -1;
     else return 1;
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
        $this->prikazi('HomePageVip.php',['str' =>1]);
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
    * Dohvata statistiku trenutnog korisnika i prikazuje taj deo stranice
    *
    * @return void
    */     
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
   /**
    * Dohvata najskorije partije trenutnog korisnika i prikazuje taj deo stranice
    *
    * @return void
    */    
    public function matchHistory(){
      $korisnik = $this->session->userdata('korisnik');
     $dohvatiPartije  = $this->Igrao->dohvatiPartijeNajskorije($korisnik->regUser->Username);
     
      $poruka['partije'] = $dohvatiPartije;
      $poruka['str'] = 3;
      $this->prikazi('HomePageVip.php',$poruka);
    }
  /**
    * Dohvata najbolje igrace i prikazuje taj deo stranice
    *
    * @return void
    */    
    public function leaderboard(){
        $poruka['igraci'] = $this->Igrac->dohvatiTop10Igraca();
        $poruka['str'] = 4;
        $this->prikazi('HomePageVip.php',$poruka);
    }
  /**
    * Sluzi za prikaz dela stranice unosa pitanja za scenu
    *
    * @return void
    */       
    public function showQuestion($idScena){
        $poruka['str'] = 5;
        $poruka['scena'] = $this->MovieInsert->dohvatiScenu($idScena);
        $this->prikazi('HomePageVip.php',$poruka);
    }
  /**
    * Sluzi za prikaz dela stranice sa svim scenama
    *
    * @return void
    */     
    public function showInserts(){
        $poruka['str'] = 6;
        $poruka['dohvatiScene'] = $this->MovieInsert->dohvatiScene();
        $this->prikazi('HomePageVip.php',$poruka);
    }
  /**
    * Sluzi za unos pitanja
    *
    * @return void
    */     
    public function insertQuestion(){
        $this->form_validation->set_rules('q', 'Question', 'required|max_length[100]');
        $this->form_validation->set_rules('cor', 'Correct Answer', 'required|max_length[100]');
        $this->form_validation->set_rules('wra1', 'Wrong Answer 1', 'required|max_length[100]');
        $this->form_validation->set_rules('wra2', 'Wrong Answer 2', 'required|max_length[100]');
        $this->form_validation->set_rules('wra3', 'Wrong Answer 3', 'required|max_length[100]');
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
  /**
    * Sluzi za vracanje nazad
    *
    * @return void
    */     
    public function back(){
        $this->showInserts();
    }
  /**
    * Funkcija koja se poziva asinhrono da bi se dobio broj igraca za trenutnu partiju
    *
    * @return int
    */     
    public function dohvatiPartiju(){
       $idP = $this->session->userdata('partija');
       $part =$this->Partija->dohvatiBrojIgraca($idP);
       echo $part;
    }
     /**
    * Prikaz stranice za cekanje
    *
    * @return void
    */      
    public function prikazCekanje(){
        $poruka['controller'] = 'VipC';
        $this->prikazi('Waiting.php',$poruka);
    }
         /**
    * Proverava unos podataka za ime gosta, i trazi partiju
    *
    * @return void
    */
    public function play(){
        $korisnik = $this->session->userdata('korisnik');
         
        $id = $this->Partija->dodajIgraca($korisnik->regUser->Username);
        $this->session->set_userdata('partija',$id);
        $poruka['controller'] = 'VipC';
        redirect('RegularUser/prikazCekanje');
    }
    /**
    * Dohvata/bira pitanja (ako nisu vec odabrana) za trenutnu partiju
    *
    * @return void
    */      
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
         /**
    * Prikazuje stranicu za odbrojavanje
    *
    * @return void
    */ 
    public function screen321(){
        $poruka['controller'] = "VipC";
        $this->prikazi('Screen321.php',$poruka);
    }
              /**
    * Prikazuje stranicu za pocetak igre
    *
    * @return void
    */ 
    public function go(){
        $poruka['controller'] = "VipC";
        $this->prikazi('Go.php',$poruka);
    }
      /**
    * Prikazuje stranicu za broj pitanja i proverava da li je doslo do kraja partije
    *
    *@param int $br 
    * @return void
    */ 
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
          /**
    * Prikazuje stranicu sa odgovarajucim insertom
    *
    * @param int $br
    * @return void
    */ 
    public function game($br){
        $pitanja = $this->session->userdata('pitanja');
        $poruka['scena'] = $pitanja[$br]->Naziv;
        $poruka['broj'] = $br;
        $poruka['controller'] = "VipC";
        $this->prikazi('Game.php',$poruka);   
    }
     /**
    * Prikazuje stranicu sa ishodom partije koji takodje odredjuje
    *
    * @return void
    */ 
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
     /**
    * Prikazuje stranicu sa pitanjem
    *
    * @param int $br
    * @return void
    */ 
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
    /**
    * Asinhrono dohvata broj odgovora za odgovarajuce pitanje
    *
    * @param int $br
    * @return int
    */    
    public function proveraOdgovora($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPartija = $this->session->userdata('partija');
        $username =  $this->session->userdata('korisnik')->regUser->Username;
        
        $idPitanje = $pitanja[$br]->IdPitanje;
        $odg =  $this->Pitanje->dohvTacan($idPitanje);
        echo $odg->IdOdgovor;
        
    }
    /**
    * Asinhrono dohvata koliko ljudi je odgovorilo na trenutno pitanje
    *
    * @param int $br
    * @return int
    */    
    public function brojOdgovora($br){
        $idP = $this->session->userdata('partija');
        $brojOdgovora = $this->Partija->dohvatiBrojOdgovora($idP,$br);
        echo $brojOdgovora;
    }
       /**
    * Asinhrono povecava broj poena za korisnika
    *
    * @param int $points
    * @return void
    */  
    public function updatePoints($points){
       $idP = $this->session->userdata('partija');
       $username = $this->session->userdata('korisnik')->regUser->Username;
       $this->Igrao->dodajPoene($idP,$username,$points);
    }
        /**
    * Asinhrono povecava broj lajkova za pitanje
    *
    * @param int $br
    * @return void
    */
    public function likeQuestion($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPitanje = $pitanja[$br]->IdPitanje;
        $this->Pitanje->reactToQuestion($idPitanje,'Likes');
    }
         /**
    * Asinhrono povecava broj dislajkova za pitanje
    *
    * @param int $br
    * @return void
    */ 
    public function dislikeQuestion($br){
        $pitanja = $this->session->userdata('pitanja');
        $idPitanje = $pitanja[$br]->IdPitanje;
        $this->Pitanje->reactToQuestion($idPitanje,'Dislikes');
    }
    /**
    * Prikazuje stranicu gde se cekaju ostali igraci da odgovore
    *
    * @param int $br
    * @return void
    */    
    public function waitForPlayers($br){
        $idPartija = $this->session->userdata('partija');
        $username =  $this->session->userdata('korisnik')->regUser->Username;
        $this->Igrao->updatePitanjeNa($username,$idPartija,$br+1);
        
        $this->prikazi("WaitingForPlayers.php",['br'=>$br,'controller'=>"VipC"]);
    }
     /**
    * Prikazuje stranicu sa trenutnim rezultatima
    *
    * @param int $br
    * @return void
    */  
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
    /**
    * Zatvara sesije vezane za partiju
    *
    * 
    * @return void
    */     
    private function unsetData(){
        $this->session->unset_userdata('partija');
        $this->session->unset_userdata('pitanja'); 
    }
  /**
    * Vraca korisnika na pocetnu stranicu
    *
    * 
    * @return void
    */     
    public function goToMenu(){
        $this->unsetData();
        redirect('VipC');
    }
    /**
    * Zapocinje novu igru
    *
    * 
    * @return void
    */
    public function playAgain(){
        $this->unsetData();
        $this->play();
    }
           /**
    * Sluzi prilikom refreshovanja stranice da se korisnik vrati na pocetnu
    *
    * 
    * @return void
    */
    public function redirectPageWaiting(){
        $idP = $this->session->userdata('partija');
        $this->Partija->smanjiBrojIgraca($idP);
        $Username = $this->session->userdata('korisnik')->regUser->Username;
        $this->Igrao->izbrisiRelaciju($Username,$idP);
        $this->unsetData();
        redirect('VipC');
    }
    /**
    * Sluzi prilikom refreshovanja stranice da se korisnik vrati na pocetnu
    *
    * 
    * @return void
    */     
    public function redirectPage(){
        $idP = $this->session->userdata('partija');
        $Username = $this->session->userdata('korisnik')->regUser->Username;
        $this->Igrao->updatePitanjeNa($Username,$idP,15);
        $this->unsetData();
        redirect('VipC');
    }
}
