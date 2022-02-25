<?php

include_once "conexao.php";

try{
    $sql         = "SELECT * FROM tblnivelacesso";
    $qry         = $conn->query($sql);
    $nivelacesso = $qry->fetchAll(PDO::FETCH_OBJ);
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
    
<h1>Níveis de Acesso Cadastrados</h1>
<hr>
<div class="container">
    <a href="frmnivelacesso.php">Novo</a> | <a href="index.php">Volta</a> 
    <br><br>
    <table border=1>
        <thead>
            <th>idnivelacesso</th>
            <th>nivelacesso</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php foreach ($nivelacesso as $na) { ?>
                <tr>
                    <th><?php echo $na->idnivelacesso ?></th>
                    <th><?php echo $na->nivelacesso ?></th> 
                              
                    <th><a href=""></a><?php  ?></th>
                    <th><a href=""></a><?php  ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>