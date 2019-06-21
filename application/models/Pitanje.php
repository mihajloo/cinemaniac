<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Pitanje - klasa koja realizuje upite vezane za tabelu pitanje
 *
 * @version 1.0
 * @author Mihajlo Ogrizovic 0246/2016
 */
class Pitanje extends CI_Model {
  /**
    * Kreiranje nove instance
    *
    * @return void
    */      
    public function __construct() {
        parent::__construct();
    }
  /**
    * Bira 10 nasumicnih pitanja
    *
    * @return stdClass[]
    */     
    public function izaberiPitanja(){
        $this->db->select('p.IdPitanje AS IdPitanje,p.Tekst AS Tekst, s.Naziv AS Naziv');
        $this->db->from('pitanje p ,scena s');
        $this->db->where("p.IdScena=s.IdScena AND p.Odobreno='jeste'");
        $this->db->order_by('p.IdPitanje', 'RANDOM');
        $this->db->limit(10);
        return $this->db->get()->result();
    }
  /**
    * Dohvata scenu za zadato pitanje
    *
    * @param int $IdPitanje 
    * @return stdClass
    */
    public function dohvScenu($IdPitanje){
        $this->db->select('s.IdScena AS IdScena,s.Naziv AS Naziv');
        $this->db->from('pitanje p ,scena s');
        $this->db->where('p.IdPitanje', $IdPitanje);
        $this->db->where('p.IdScena=s.IdScena');   
        return $this->db->get()->row();
    }
  /**
    * Dohvata tekst za zadato pitanje
    *
    * @param int $IdPitanje 
    * @return stdClass
    */    
    public function dohvTekst($IdPitanje){
         $this->db->select('Tekst');
         $this->db->from('pitanje');
         $this->db->where('IdPitanje',$IdPitanje);
         return $this->db->get()->row();
    }
   /**
    * Dohvata tacan odgovor za zadato pitanje
    *
    * @param int $IdPitanje 
    * @return stdClass
    */   
    public function dohvTacan($IdPitanje){
        $this->db->select('o.IdOdgovor AS IdOdgovor,o.Tekst AS Tekst');
        $this->db->from('pitanje p ,odgovor o');
        $this->db->where('p.IdPitanje',$IdPitanje);
        $this->db->where('p.IdTacan = o.IdOdgovor');
        return $this->db->get()->row();
    }
   /**
    * Dohvata netacne odgovore za zadato pitanje
    *
    * @param int $IdPitanje 
    * @return stdClass[]
    */    
     public function dohvNetacne($IdPitanje){
        $this->db->select('o.IdOdgovor AS IdOdgovor,o.Tekst AS Tekst');
        $this->db->from('pitanje p ,odgovor o,netacanodgovorna n');
        $this->db->where('p.IdPitanje',$IdPitanje);
        $this->db->where('p.IdPitanje = n.IdPitanje');
        $this->db->where('o.IdOdgovor = n.IdOdgovor');
        return $this->db->get()->result();
    }
    /**
    * Dohvata neodobrena pitanja
    *
    * 
    * @return stdClass[]
    */       
    public function dohvatiNeodobrena(){
         $this->db->select('p.IdPitanje AS IdPitanje,p.Tekst AS Tekst,s.Naziv AS NazivScena,f.Naziv AS NazivFilm');
         $this->db->from('pitanje p,scena s,film f');
         $this->db->where('p.Odobreno', "nije");
         $this->db->where('p.IdScena=s.IdScena AND s.IdFilm=f.IdFilm');
        return $this->db->get()->result();
    }
   /**
    * Dohvata odobrena pitanja
    *
    * 
    * @return stdClass[]
    */    
     public function dohvatiOdobrena(){
         $this->db->select('p.IdPitanje AS IdPitanje,p.Tekst AS Tekst,s.Naziv AS NazivScena,f.Naziv AS NazivFilm,p.Likes AS Likes,p.Dislikes AS Dislikes');
         $this->db->from('pitanje p,scena s,film f');
         $this->db->where('p.Odobreno', "jeste");
         $this->db->where('p.IdScena=s.IdScena AND s.IdFilm=f.IdFilm');
        return $this->db->get()->result();
    }
   /**
    * Menja zadato pitanje
    *
    * @param int $idQ,$idw1,$idw2,$idw3, String $ca,$wa1,$wa2,$wa3,$odobreno
    * @return void
    */     
    public function updatePitanje($idQ,$question,$ca,$wa1,$wa2,$wa3,$idw1,$idw2,$idw3,$odobreno){
        $this->db->where('IdOdgovor',$idw1);
        $this->db->update('odgovor',['Tekst' => $wa1]);
        
        $this->db->where('IdOdgovor',$idw2);
        $this->db->update('odgovor',['Tekst' => $wa2]);
        
        $this->db->where('IdOdgovor',$idw3);
        $this->db->update('odgovor',['Tekst' => $wa3]);
        
        $this->db->select('o.IdOdgovor AS odg');
        $this->db->from('pitanje p,odgovor o');
        $this->db->where('p.IdPitanje',$idQ);
        $this->db->where('p.IdTacan=o.IdOdgovor');
        $tacan = $this->db->get()->row();
        
        $this->db->where('IdOdgovor',$tacan->odg);
        $this->db->update('odgovor',['Tekst' => $ca]);
        
        $this->db->where('IdPitanje',$idQ);
        $this->db->update('pitanje',['Tekst' => $question,'Odobreno' =>$odobreno]);
    }
   /**
    * Brise zadato pitanje
    *
    * @param int $idQ
    * @return void
    */     
    public function deletePitanje($idQ){
       $this->db->where('IdPitanje',$idQ); 
       $this->db->delete('pitanje');
    }
   /**
    * Ubacuje pitanje, kao i njegove odgovore
    *
    * @param String $question,$corAns,$odobreno, int $idS
    * @return int
    */    
    public function insertPitanje($question,$corAns,$idS,$odobreno){
        $this->db->insert('pitanje',['Likes'=>0,'Dislikes'=>0,'Tekst'=>$question,'IdTacan'=>$corAns,'IdScena'=>$idS,'Odobreno'=>$odobreno]);
        return $this->db->insert_id();
    }
     /**
    * Ubacuje reakciju na zadato pitanje
    *
    * @param int $idPitanje, String $reaction
    * @return void
    */    
    public function reactToQuestion($idPitanje,$reaction){
        $this->db->set($reaction, $reaction.'+1', FALSE);
        $this->db->where('IdPitanje', $idPitanje);
        $this->db->update('pitanje');
    }
 
}
