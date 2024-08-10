<?php

require 'config.php';
require 'dao/UsuarioDAOMySQL.php';

// Instancia
$usuarioDao = new UsuarioDaoMysql($pdo);

// verificando ID
$id = filter_input(INPUT_GET, 'id');
// verificando se foi enviado algum dado
if($id){

    $usuarioDao->delete($id);

}

header("Location: index.php");
exit;