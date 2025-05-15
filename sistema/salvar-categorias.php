<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$categoriaid = NULL;

if (!empty($_GET['categoriaid'])){
  $categoriaid = $_GET['categoriaid'];
}

$categoria = [
  'CategoriaID' => '',
  'Nome' => '',
  'Descricao' => ''
];

if (!empty($_GET['categoriaid'])) {
  $sql = "SELECT * FROM categorias WHERE CategoriaID = $categoriaid";
  $resultado = mysqli_query($conn,$sql);
  $categoria = mysqli_fetch_assoc($resultado) ?: $categoria;
};

?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/categorias.php?acao=salvar&categoriaid=<?php echo $categoriaid ?>">
          <h2><?php echo empty($categoria['CategoriaID']) ? 'Cadastro' : 'Edição'; ?> Categorias</h2>
          <input type="hidden" name='id' value='<?php echo $categoria['CategoriaID']; ?>'>
          <input type="text" placeholder="Nome da Categoria" name='nome' value='<?php echo $categoria['Nome']; ?>' required>
          <textarea placeholder="Descrição" name='descricao' required><?php echo $categoria['Descricao']; ?></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
