<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Guest - klasa koja realizuje funkcionalnosti vezane za gosta
 *
 * @version 1.0
 * @author Milutin Dobricic 0575/2016
 */
class Guest extends CI_Controller{
    /**
    * Kreiranje nove instance
    *
    * @return void
    */
    public function __construct() {       
        parent::__construct();

        $this->session->unset_userdata('korisnik');
        
        $korisnik = $this->session->userdata('korisnik');
        if($korisnik != null) {
            if($this->Admin->proveriAdmina($korisnik->Username)) {
                redirect('Admin');
            }
            
            if($this->Moderator->proveriModeratora($korisnik->Username)) {
                redirect('Moderator');
            }
            
            if($this->Igrac->proveriIgraca($korisnik->Username)) {
                redirect('Igrac');
            }
            else {
                redirect('Vip');
            }        
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
    public function index(){
        $this->prikazi('MainPage.php');
    }
    /**
    * Ucitava stranicu za logovanje
    *
    * @return void
    */     
    public function loginPage(){
        $this->prikazi('LogIn.php');
    }
    /**
    * Ucitava stranicu za unos imena gosta
    *
    * @return void
    */      
    public function guestNamePage(){
        $poruka['controller'] = "Guest";
        $this->prikazi('GuestName.php',$poruka);
    }
    /**
    * Proverava da li su ispravno uneti podaci za logovanje
    *
    * @return void
    */     
    public function checkLogin(){
       $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('Password', 'password', 'required');
        
        if($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('Password');  
            $korisnik = new stdClass();
            $korisnik->regUser = $this->Korisnik->dohvatiKorisnika($username);
            
            if($korisnik->regUser != null) {
                if($korisnik->regUser->Password == $password) {
                   
                 //   echo $korisnik->IdKorisnik;
                    if($this->Admin->proveriAdmina($username)) {
                      
                        $this->session->set_userdata('korisnik', $korisnik);
                        redirect('AdminC');                      
                    }
                    
                    if($this->Moderator->proveriModeratora($username)) {
                        $this->session->set_userdata('korisnik', $korisnik);
                        redirect('ModeratorC');
                    }
                    
                    if($this->Vip->proveriVipa($username)) {
                        $korisnik->igrac = $this->Igrac->dohvatiIgraca($username);
                        $this->session->set_userdata('korisnik', $korisnik);
                        redirect('VipC');
                    }
                    else{
                        $korisnik->igrac = $this->Igrac->dohvatiIgraca($username);
                        $this->session->set_userdata('korisnik', $korisnik);
                        redirect('RegularUser');
                    }
                    
                }
                else {
                    $content['korime'] = $username; //postoji username, ali je sifra pogresna (zapamtim ga)
                    $content['poruka'] = 'Wrong password!';
                    $this->prikazi('LogIn.php', $content);
                }
            }
            else {
                $content['poruka'] = 'Wrong username!';
                $this->prikazi('LogIn.php', $content);
            }
        }
        else {
            $content['poruka'] = 'All fields are required!';
            $this->prikazi('LogIn.php', $content);
        }
    }
    /**
    * Ucitava stranicu za registraciju
    *
    * @return void
    */    
    public function registerPage(){
        $this->prikazi('Register.php');
    }
    /**
    * Proverava da li su ispravno uneti podaci za registraciju
    *
    * @return void
    */    
    public function register(){
    //    $this->form_validation->set_rules('name', 'name', 'required');
     //   $this->form_validation->set_rules('lastname', 'lastname', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|min_length[4]|max_length[8]');
        $this->form_validation->set_rules('Password', 'password', 'required|min_length[6]|max_length[8]|alpha_numeric');
        $this->form_validation->set_rules('ConfirmPassword', 'confirm password', 'required|matches[Password]');
        $this->form_validation->set_rules('Email', 'email', 'required|valid_email');
        
        if($this->form_validation->run()) {
            /*$name = $this->input->post('name');
            $lastname = $this->input->post('lastname');*/
            $username = $this->input->post('username');
            $password = $this->input->post('Password');  
           // $conPass = $this->input->post('ConfirmPassword');
            $email = $this->input->post('Email');
            
            $korisnik = $this->Korisnik->dohvatiKorisnika($username);
            if($korisnik == null) {
                $this->Korisnik->ubaciUBazu($username, $password, $email);
                $this->Igrac->ubaciUBazu($username);
               // $this->prikazi('MainPage.php');
                redirect('Guest');
                }
            else {
                $content['poruka'] = 'This username is already taken.';
                $this->prikazi('Register.php',$content);
            }   
        }
        else {
            $this->prikazi('Register.php');
        }
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
        $poruka['controller'] = 'Guest';
        $this->prikazi('Waiting.php',$poruka);
    }
    /**
    * Proverava unos podataka za ime gosta, i trazi partiju
    *
    * @return void
    */       
    public function play(){
        
        $this->form_validation->set_rules('username', 'username', 'required|min_length[4]|max_length[8]');
         if($this->form_validation->run()){
        $username = $this->input->post('username');
        $id = $this->Partija->dohvatiPraznuPartiju();
        $idGost = $this->Gost->dodajGosta($username,$id);
        $this->session->set_userdata('partija',$id);
        $name = $username."#".$idGost;

    
        $this->session->set_userdata('gost',$name);
        $poruka['controller'] = 'Guest';
        redirect('Guest/prikazCekanje');
         }
         else{
             $this->prikazi('GuestName.php'); 
         }
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
        $poruka['controller'] = "Guest";
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
        $poruka['controller'] = "Guest";
        $this->prikazi('Screen321.php',$poruka);
    }
      /**
    * Prikazuje stranicu za pocetak igre
    *
    * @return void
    */    
    public function go(){
        $poruka['controller'] = "Guest";
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
        $poruka['controller'] = "Guest";
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
        $poruka['controller'] = "Guest";
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
       $username = $this->session->userdata('gost');
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
        $this->Gost->dodajIshod($outcome,$username);
       
        $poruka['results'] = $results;
        $poruka['outcome'] = $outcome.'1';
        $poruka['controller'] = "Guest";
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
        $poruka['controller'] = "Guest";
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
    * Asinhrono povecava broj poena za gosta
    *
    * @param int $points
    * @return void
    */        
    public function updatePoints($points){
       $idP = $this->session->userdata('partija');
       $username = $this->session->userdata('gost');
       $this->Gost->dodajPoene($username,$points);
    }
    
   /**
    * Prikazuje stranicu gde se cekaju ostali igraci da odgovore
    *
    * @param int $br
    * @return void
    */ 
    public function waitForPlayers($br){
        $idPartija = $this->session->userdata('partija');
        $username =  $this->session->userdata('gost');
        $this->Gost->updatePitanjeNa($username,$idPartija,$br+1);
        
        $this->prikazi("WaitingForPlayers.php",['br'=>$br,'controller'=>"Guest"]);
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
        $poruka['controller'] = "Guest";
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
        $this->session->unset_userdata('gost');
    }
  /**
    * Vraca korisnika na pocetnu stranicu
    *
    * 
    * @return void
    */ 
    public function goToMenu(){
        $this->unsetData();
        redirect('Guest');
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
        $name = $this->session->userdata('gost');
        $this->Gost->izbrisiGosta($name);
        $idP = $this->session->userdata('partija');
        $this->Partija->smanjiBrojIgraca($idP);
        
        $this->unsetData();
        redirect('Guest');
    }
    /**
    * Sluzi prilikom refreshovanja stranice da se korisnik vrati na pocetnu
    *
    * 
    * @return void
    */      
    public function redirectPage(){
        $name = $this->session->userdata('gost');
       
        $idP = $this->session->userdata('partija');
        $this->Gost->updatePitanjeNa($name,$idP,15);
        $this->unsetData();
        redirect('Guest/index');
    }
}
