<?php

include_once "conexao.php";

try{
    $sql      = "SELECT * FROM tblservicos";
    $qry      = $conn->query($sql);
    $servicos = $qry->fetchAll(PDO::FETCH_OBJ);
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
    
<h1>Serviços Cadastrados</h1>
<hr>
<div class="container">
    <a href="frmservicos.php">Novo</a> | <a href="index.php">Volta</a> 
    <br><br>
    <table border=1>
        <thead>
            <th>idservico</th>
            <th>tiposervico</th>
            <th>idnivelacesso</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php foreach ($servicos as $s) { ?>
                <tr>
                    <th><?php echo $s->idservico ?></th>
                    <th><?php echo $s->tiposervico ?></th>
                    <th><?php echo $s->idnivelacesso ?></th>
                    
                    <th><a href=""></a><?php  ?></th>
                    <th><a href=""></a><?php  ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>