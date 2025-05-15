<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$produtoid = NULL;

if (!empty($_GET['produtoid'])){
  $produtoid = $_GET['produtoid'];
}

$produto = [
  'ProdutoID' => '',
  'Nome' => '',
  'Categoria' => '',
  'Preco' => '',
  'Peso' => '',
  'Descricao' => ''
];

if (!empty($_GET['produtoid'])) {
  $sql = "SELECT * FROM produtos WHERE ProdutoID = $produtoid";
  $resultado = mysqli_query($conn,$sql);
  $produto = mysqli_fetch_assoc($resultado) ?: $produto;
};

?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="./action/produtos.php?acao=salvar&produtoid=<?php echo $produtoid ?>" method="post">
          <h2><?php echo empty($produto['ProdutoID']) ? 'Cadastro' : 'Edição'; ?> de Produtos</h2>
          <input type="hidden" name='id' value='<?php echo $produto['ProdutoID']; ?>'>
          <input type="text" placeholder="Nome do Produto" name='nome' value='<?php echo $produto['Nome']; ?>' required>
          <input type="number" placeholder="Preço" name='preco' value='<?php echo $produto['Preco']; ?>' required>
          <input type="number" placeholder="Peso (g)" name='peso' value='<?php echo $produto['Peso']; ?>' required>
          <textarea placeholder="Descrição" name='descricao' required><?php echo $produto['Descricao']; ?></textarea>
          <select name='categoria'>
            <option value="">Categoria</option>
            <?php 
              $sql_categorias = "SELECT * FROM categorias";
              $resultado_categorias = mysqli_query($conn,$sql_categorias);
              while ($categoria = mysqli_fetch_assoc($resultado_categorias)){
            ?>
            <option value="<?php echo $categoria['CategoriaID'] ?>"<?php if (!empty($produto['CategoriaID']) && $categoria['CategoriaID'] == $produto['CategoriaID'] ){echo 'selected';} ?>><?php echo $categoria['Nome'] ?></option>
            <?php
            }
            ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>