<?php
require ('config.php');

$lista = [];
// pegando os usuarios
$sql = $pdo->query("SELECT * FROM usuarios");
 // verificando se existir usuarios
 if($sql->rowCount() > 0){
   $lista = $sql->fetchAll(PDO::FETCH_ASSOC); // gerando uma lista e fazendo associação de campos
 }
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
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td>
                <!-- fazendo referencia de  ID pra saber quem vou excluir -->
                <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Tem certeza que deseja deletar?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
</table>