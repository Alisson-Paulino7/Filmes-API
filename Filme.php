<?php


class Filme{
    private $id;
    private $nome;
    private $genero;
    private $duracao;

    public function __construct($nome, $genero, $duracao){
        $this->nome = $nome;
        $this->genero = $genero;
        $this->duracao = $duracao;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getDuracao(){
        return $this->duracao;
    }

    public function setDuracao($duracao){
        $this->duracao = $duracao;
    }
}