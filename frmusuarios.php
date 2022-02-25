<?php

$idusuario = isset($_GET["idusuario"]) ? $GET["idusuario"]:null;
$op = isset($_GET["op"]) ? $_GET["op"]:null;

try{
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "";
    $bd       = "atividade2302";

    $conn = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha);

    if($op=="del"){
        $sql  = "DELETE FROM tblusuarios WHERE idusuario=:idusuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":idusuario", $idusuario);
        $stmt->execute();
        header("Location: listarusuarios.php");
    }
    if($idusuario){
        $sql  = "SELECT * FROM tblusuarios WHERE idusuario=:idusuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":idusuario", $idusuario);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);
    }
    if($_POST){
        if($_POST["idusuario"]){
            $sql  = "UPDATE tblusuarios SET nome=:nome, email=:email, idnivelacesso=:idnivelacesso, idstatus=:idstatus WHERE idusuario=:idusuario";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":nome", $_POST["nome"]);
            $stmt->bindValue(":email", $_POST["email"]);
            $stmt->bindValue(":idnivelacesso", $_POST["idnivelacesso"]);
            $stmt->bindValue(":idstatus", $_POST["idstatus"]);
            $stmt->bindValue(":idusuario", $_POST["idusuario"]);
            $stmt->execute();
        }
        else{
            $sql = "INSERT INTO tblusuarios (nome,email,idnivelacesso,idstatus) VALUES (:nome,:email,:idnivelacesso,:idstatus)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":nome", $_POST["nome"]);
            $stmt->bindValue(":email", $_POST["email"]);
            $stmt->bindValue(":idnivelacesso", $_POST["idnivelacesso"]);
            $stmt->bindValue(":idstatus", $_POST["idstatus"]);
            $stmt->execute();
        }
        header("Location: listarusuarios.php");
    }
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
    <title>Cadastro de Usuarios</title>
</head>
<body>
    
<h1>Formulário de Usuários</h1>
<br><br>
<div class="container">
    <form method="POST">
        Nome         <input type="text"  name="nome"          value=" <?php echo isset($usuario) ? $usuario->nome          :null ?> ">
        Email        <input type="email" name="email"         value=" <?php echo isset($usuario) ? $usuario->email         :null ?> ">
        Nivel Acesso <input type="text"  name="idnivelacesso" value=" <?php echo isset($usuario) ? $usuario->idnivelacesso :null ?> ">
        Status       <input type="text"  name="idstatus"      value=" <?php echo isset($usuario) ? $usuario->idstatus      :null ?> ">
                     <input type="hidden" name="idusuario"    value=" <?php echo isset($usuario) ? $usuario->idusuario     :null ?> ">
                     <input type="submit" value="Cadastrar">
    </form>
</div>

</body>
</html>