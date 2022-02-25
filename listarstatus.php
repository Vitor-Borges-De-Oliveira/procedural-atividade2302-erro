<?php

include_once "conexao.php";

try{
    $sql    = "SELECT * FROM tblstatus";
    $qry    = $conn->query($sql);
    $status = $qry->fetchAll(PDO::FETCH_OBJ);
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
    
<h1>Status Cadastrados</h1>
<hr>
<div class="container">
    <a href="frmstatus.php">Novo</a> | <a href="index.php">Volta</a> 
    <br><br>
    <table border=1>
        <thead>
            <th>idstatus</th>
            <th>status</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php foreach ($status as $st) { ?>
                <tr>
                    <th><?php echo $st->idstatus ?></th>
                    <th><?php echo $st->status ?></th>
                    
                    <th><a href=""></a><?php  ?></th>
                    <th><a href=""></a><?php  ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>