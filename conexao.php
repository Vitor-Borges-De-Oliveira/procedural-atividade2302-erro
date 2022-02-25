<?php

$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$bd       = "atividade2302";

try{
    $conn = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha);
}
catch(PDOException $e){
    echo "Erro: ".$e->getMessage();
}