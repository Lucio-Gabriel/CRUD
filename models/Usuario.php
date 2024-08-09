<?php

class Usuario{

    private $id;
    private $nome;
    private $email;

    public function getId(){
        return $this->id;
    }
    public function setId($i){
        $this->id = trim($i);
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = strtolower(trim($e));
    }
}

// classe que vai implemntar oo banco de dados

interface UsuarioDAO {
    public function add(Usuario $u); // creat
    public function findAll(); // Retorna uma lista com varios objetos da class obj
    public function findByEmail($email); // Buscando usuario por email
    public function findById($id); // Estou procurando pelo ID
    public function update(Usuario $u); //noosso update para manibular
    public function delete($id); //Deleta por ID 
}