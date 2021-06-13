<?php

namespace Svalina;

/**
 * @Entity @Table(name="ontologija")
 **/


class Ontologija 

{
    /** @id @Column(type="integer") @GeneratedValue **/
    protected $sifra;

    /**
    * @Column(type="string")
    */
    private $film;

     /**
    * @Column(type="string")
    */
    private $glumac;

     /**
    * @Column(type="string")
    */
    private $zanr;

     /**
    * @Column(type="string")
    */
    private $nagrada;

     /**
    * @Column(type="integer")
    */
    private $godinaIzlaska;

    /**
    * @Column(type="string")
    */
    private $trajanje;


    

    public function getSifra(){
      return $this->sifra;
    }
  
    public function setSifra($sifra){
      $this->sifra = $sifra;
    }
  
    public function getFilm(){
      return $this->film;
    }
  
    public function setFilm($film){
      $this->film = $film;
    }
  
    public function getGlumac(){
      return $this->glumac;
    }
  
    public function setGlumac($glumac){
      $this->glumac = $glumac;
    }
  
    public function getZanr(){
      return $this->zanr;
    }
  
    public function setZanr($zanr){
      $this->zanr = $zanr;
    }
  
    public function getNagrada(){
      return $this->nagrada;
    }
  
    public function setNagrada($nagrada){
      $this->nagrada = $nagrada;
    }
  
    public function getGodinaIzlaska(){
      return $this->godinaIzlaska;
    }
  
    public function setGodinaIzlaska($godinaIzlaska){
      $this->godinaIzlaska = $godinaIzlaska;
    }
  
    public function getTrajanje(){
      return $this->trajanje;
    }
  
    public function setTrajanje($trajanje){
      $this->trajanje = $trajanje;
    }
    

  
    public function setPodaci($podaci)
    {
      foreach($podaci as $kljuc => $vrijednost){
        $this->{$kljuc} = $vrijednost;
      }
    }
    
  }

?>