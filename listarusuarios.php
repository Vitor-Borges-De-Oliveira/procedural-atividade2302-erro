<?php

include_once "conexao.php";

try{
    $sql      = "SELECT * FROM tblusuarios";
    $qry      = $conn->query($sql);
    $usuarios = $qry->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
</head>
<body>
    
<h1>Usuarios Cadastrados</h1>
<hr>
<div class="container">
    <a href="frmusuarios.php">Novo</a> | <a href="index.php">Volta</a> 
    <br><br>
    <table border=1>
        <thead>
            <th>id</th>
            <th>nome</th>
            <th>email</th>
            <th>idnivelacesso</th>
            <th>idstatus</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u) { ?>
                <tr>
                    <td><?php echo $u->idusuario ?></td>
                    <td><?php echo $u->nome ?></td>
                    <td><?php echo $u->email ?></td>
                    <td><?php echo $u->idnivelacesso ?></td>
                    <td><?php echo $u->idstatus ?></td>

                    <td><a href="frmusuarios.php?idusuario=<?php echo $u->idusuario ?>" >>Editar</a></td>
                    <td><a href="frmusuarios.php?op=del&idusuario=<?php echo $u->idusuario ?>" >Excluir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>