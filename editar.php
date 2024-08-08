<?php

require 'config.php';

// vai conter as informação do user
$info = [];

// verificando ID
$id = filter_input(INPUT_GET, 'id');
// verificando se foi enviado algum dado
if($id){

    // procurando o id
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    // substituindo os dados
    $sql->bindValue(':id', $id);
    $sql->execute();

    // verificando os dados
    if($sql->rowCount() > 0){

        $info = $sql->fetch( PDO::FETCH_ASSOC );
    }
    else{
        header("Location: index.php");
        exit;
    }

}else {
    header("Location: index.php");
    exit;
}
?>

<form method="POST" action="editar_action.php">

<!-- mandando o ID por uum campo oculto -->
 <input type="hidden" name="id" value="<?=$info['id'];?>"/>

<!-- form de login -->

<h1>Editar Usúario</h1>

    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$info['nome'];?>"/>
    </label><br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$info['email'];?>"/>
    </label><br/></br>

    <input type="submit" value="Salvar" />

</form>