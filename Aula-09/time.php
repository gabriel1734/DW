<?php
  require_once("conectaDB.php");
  class Time {
    
    public $nome;
    public $pontos;
    
    public function __construct($nome=null, $pontos = 0) {
      $this->nome = $nome;
      $this->pontos = $pontos;
    }
    public function setNomeTime($nome) {
      $this->nome = $nome;
    }
    public function setPontosTime($pontos) {
      $this->pontos = $pontos;
    }
    public function getNomeTime() {
      return $this->nome;
    }
    public function getPontosTime() {
      return $this->pontos;
    }
    
  }