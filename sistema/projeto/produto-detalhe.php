<?php
include_once './conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE ProdutoID=".$id;

$resultado = mysqli_query($conn,$sql);

$dado = mysqli_fetch_assoc($resultado);
?>
<h1><?php echo $dado['Nome'] ?></h1>
<p>Preço = R$<?php echo $dado['Preco'] ?></p>
<p>Descrição = <?php echo $dado['Descricao'] ?></p>
<p>Peso = <?php echo $dado['Peso'] ?></p>