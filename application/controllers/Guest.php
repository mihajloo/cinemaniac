<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Guest
 *
 * @author Mihajlo
 */
class Guest extends CI_Controller{
    public function __construct() {       
        parent::__construct();
        $this->load->model('Korisnik');
        $this->load->model('Admin');
        $this->load->model('Moderator');
        $this->load->model('Igrac');
        
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
    private function prikazi($page, $content = []) {
        $this->load->view($page, $content);
    }
    public function index(){
        $this->prikazi('MainPage.php');
    }
    public function loginPage(){
        $this->prikazi('LogIn.php');
    }
    public function guestNamePage(){
        $this->prikazi('GuestName.php');
    }
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
                    
                    if($this->Igrac->proveriIgraca($username)) {
                        $korisnik->igrac = $this->Igrac->dohvatiIgraca($username);
                        $this->session->set_userdata('korisnik', $korisnik);
                        redirect('RegularUser');
                    }
                    else {
                        $this->session->set_userdata('korisnik', $korisnik);
                        redirect('VipC');
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
    public function registerPage(){
        $this->prikazi('Register.php');
    }

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
    
}
