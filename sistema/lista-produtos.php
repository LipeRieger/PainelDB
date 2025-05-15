<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//comando de SQL para executar
$sql = "SELECT p.ProdutoID,p.Nome,c.Nome AS Categoria, CONCAT('R$ ', FORMAT(p.Preco, 2, 'de_DE')) as Prec FROM produtos AS p
INNER JOIN categorias AS c ON p.CategoriaID = c.CategoriaID
ORDER BY p.ProdutoID ASC";

//executa e retorna os dados
$resultado = mysqli_query($conn,$sql);
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <?php
          while ($dado = mysqli_fetch_assoc($resultado)){
        ?>
          <tr>
            <td><?php echo $dado['ProdutoID'] ?></td>
            <td><?php echo $dado['Nome'] ?></td>
            <td><?php echo $dado['Categoria'] ?></td>
            <td><?php echo $dado['Prec'] ?></td>
            <td>
              <a href="./salvar-produtos.php?produtoid=<?php echo $dado['ProdutoID']?>" class="btn btn-edit">Editar</a>
              <a href="./action/produtos.php?acao=delete&produtoid=<?php echo $dado['ProdutoID'] ?>" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
        <?php
          }
        ?>
      </table>
    </div>
</main>
<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>