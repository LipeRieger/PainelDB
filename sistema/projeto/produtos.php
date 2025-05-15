<?php

//faz conexção com o banco de dados
include_once './conexao.php';

//comando de SQL para executar
$sql = "SELECT * FROM produtos";

//executa e retorna os dados
$resultado = mysqli_query($conn,$sql);

//mostra o resultado na tela
echo '<prev>';print_r($resultado); echo '</prev>';

while ($dado = mysqli_fetch_assoc($resultado)){
    echo '<a href="./produto-detalhe.php?id='.$dado['ProdutoID'].'">'.$dado['Nome'].'<br>';
}

?>