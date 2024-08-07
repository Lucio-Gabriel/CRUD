<?php

require 'config.php';

// filtrando e pegando os valores dos meus inputs
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// fazendo as verificações se os campos estão todos preenchidos
if( $name && $email ){

    // verificando no banco se existi registro de emails iguais
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
            // falando a ação pro banco do que eu vou receber 
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
    
        // Substituindo valores para quando eu inserir no form
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();

        header("Location: index.php");
        exit;
    }
    else{
        header("Location: adicionar.php");
        exit;
    }
}
else{
    // caso não preencha nada ou preencha errado ele destroi o programa e retorna pra pag de form
    header("Location: adicionar.php");
    exit;
}