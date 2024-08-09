<?php
require ('config.php');
require 'dao/UsuarioDAOMySQL.php';

// Instancia
$usuarioDao = new UsuarioDaoMysql($pdo);
// pegando lista de usuarios
$lista = $usuarioDao->findAll();
?>

<!-- Tela de usuário -->
<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>

    <!-- Exibir usuarios na tela -->
    <!-- // verificando se existir usuarios -->
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?=$usuario->getId();?></td>
            <td><?=$usuario->getNome();?></td>
            <td><?=$usuario->getEmail();?></td>
            <td>
                <!-- fazendo referencia de  ID pra saber quem vou excluir -->
                <a href="editar.php?id=<?=$usuario->getId();?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario->getId();?>" onclick="return confirm('Tem certeza que deseja deletar?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
</table>