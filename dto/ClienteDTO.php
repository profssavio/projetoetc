<?php

class ClienteDTO {
    private $id;
    private $nome;
    private $cpf;
    private $datanascimento;
    private $sexo;
    private $telefone;
    private $email;
    private $senha;
    private $perfil;
    private $foto;

    public function getId() {
        return $this->id;
    }
    public function setId( $id ) {
        $this->id = $id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome( $nome ) {
        $this->nome = $nome;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf( $cpf ) {
        $this->cpf = $cpf;
    }
    public function getDataNascimento() {
        return $this->datanascimento;
    }
    public function setDataNascimento( $dataNascimento ) {
        $this->datanascimento = $dataNascimento;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone( $telefone ) {
        $this->telefone = $telefone;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo( $sexo ) {
        $this->sexo = $sexo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail( $email ) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha( $senha ) {
        $this->senha = $senha;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setPerfil( $perfil ) {
        $this->perfil = $perfil;
    }

    public function getFoto() {
        return $this->foto;
    }
    
    public function setFoto( $foto ) {
        $this->foto = $foto;
    }
}