<?php

require 'config.php';
require 'dao/UsuarioDAOMySQL.php';

// Instancia
$usuarioDao = new UsuarioDaoMysql($pdo);

// filtrando e pegando os valores dos meus inputs
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// fazendo as verificações se os campos estão todos preenchidos
if( $name && $email ){

    // implementação
    if($usuarioDao->findByEmail($email) === false){
        // se não achar email adiciona 
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name); 
        $novoUsuario->setEmail($email);
        // Retorna o objeto usuario inteiro
        $usuarioDao->add( $novoUsuario );

        header("Location: index.php");
        exit;
    } else{
        header("Location: adicionar.php");
        exit;
    }
}
else{
    // caso não preencha nada ou preencha errado ele destroi o programa e retorna pra pag de form
    header("Location: adicionar.php");
    exit;
}