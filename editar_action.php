<?php

require 'config.php';

// filtrando e pegando os valores dos meus inputs
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// fazendo as verificações se os campos estão todos preenchidos
if( $id && $name && $email ){

    // nossa query pra filtrar ID e mudar o email e name
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");
    // trocando os dados
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;
    
}
else{
    // caso não preencha nada ou preencha errado ele destroi o programa e retorna pra pag de form
    header("Location: adicionar.php");
    exit;
}