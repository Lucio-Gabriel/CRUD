<?php

require 'config.php';

require 'dao/UsuarioDAOMySQL.php';

// Instancia
$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;

// verificando ID
$id = filter_input(INPUT_GET, 'id');

// verificando se foi enviado algum dado
if($id){
    $usuario = $usuarioDao->findById($id);
}

// se usuario for igual false
if($usuario === false){
    header("Location: index.php");
    exit;
}
?>

<form method="POST" action="editar_action.php">

<!-- mandando o ID por uum campo oculto -->
 <input type="hidden" name="id" value="<?=$usuario->getId();?>"/>

<!-- form de login -->

<h1>Editar Usúario</h1>

    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$usuario->getNome();?>"/>
    </label><br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>"/>
    </label><br/></br>

    <input type="submit" value="Salvar" />

</form>