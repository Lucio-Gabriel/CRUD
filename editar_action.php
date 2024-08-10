<?php

require 'config.php';

require 'dao/UsuarioDAOMySQL.php';

// Instancia
$usuarioDao = new UsuarioDaoMysql($pdo);

// filtrando e pegando os valores dos meus inputs
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// fazendo as verificações se os campos estão todos preenchidos
if( $id && $name && $email ){

    $usuario = $usuarioDao->findById($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update( $usuario );

    header("Location: index.php");
    exit;
    
}
else{
    // caso não preencha nada ou preencha errado ele destroi o programa e retorna pra pag de form
    header("Location: editar.php?id=".$id);
    exit;
}