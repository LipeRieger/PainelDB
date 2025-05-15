<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$cargoid = NULL;

if (!empty($_GET['cargoid'])){
  $cargoid = $_GET['cargoid'];
}

$cargo = [
  'CargoID' => '',
  'Nome' => '',
  'TetoSalar' => ''
];

if (!empty($_GET['cargoid'])) {
  $sql = "SELECT * FROM cargos WHERE CargoID = $cargoid";
  $resultado = mysqli_query($conn,$sql);
  $cargo = mysqli_fetch_assoc($resultado) ?: $cargo;
};

?>
  <main>

       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php?acao=salvar&cargoid=<?php echo $cargoid ?>" method="post">
      <h2><?php echo empty($cargo['CargoID']) ? 'Cadastro' : 'Edição'; ?> de Cargos</h2>
      <input type="hidden" name='id' value='<?php echo $cargo['CargoID']; ?>'>
      <input type="text" placeholder="Nome do Cargo" name='nome' value='<?php echo $cargo['Nome']; ?>' required>
      <input type="number" placeholder="Teto Salarial" name='tetosalarial' value='<?php echo $cargo['TetoSalarial']; ?>' required>
      <button type="submit">Salvar</button>
    </form>
  </div>



   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
