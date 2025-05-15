<?php

include_once './conexao.php';

$varNome = 'RH';
$varCor = 'Azul';
$varAndar = '3';

$sql = "INSERT INTO setor (Nome,Cor,Andar)
VALUE ('{$varNome}','{$varCor}','{$varAndar}');";

if ( mysqli_query($conn, $sql)){
    echo 'registro inserido com sucesso :';
}

?>