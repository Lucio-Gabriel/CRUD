<?php

require 'config.php';


// verificando ID
$id = filter_input(INPUT_GET, 'id');
// verificando se foi enviado algum dado
if($id){

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

}

header("Location: index.php");
exit;