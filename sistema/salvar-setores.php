<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$setorid = NULL;

if (!empty($_GET['setorid'])){
  $setorid = $_GET['setorid'];
}

$setor = [
  'SetorID' => '',
  'Nome' => '',
  'Andar' => '',
  'Cor' => ''
];

if (!empty($_GET['setorid'])) {
  $sql = "SELECT * FROM setor WHERE SetorID = $setorid";
  $resultado = mysqli_query($conn,$sql);
  $setor = mysqli_fetch_assoc($resultado) ?: $setor;
};
?>
  
  <main>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/setores.php?acao=salvar&setorid=<?php echo $setorid ?>">
          <h2><?php echo empty($setor['SetorID']) ? 'Cadastro' : 'Edição'; ?> de Setores</h2>
          <input type="hidden" name='id' value='<?php echo $setor['SetorID']; ?>'>
          <input type="text" placeholder="Nome do Setor" name='nome' value='<?php echo $setor['Nome']; ?>' required>
          <input type="text" placeholder="Andar" name='andar' value='<?php echo $setor['Andar']; ?>' required>
          <input type="text" placeholder="Cor" name='cor' value='<?php echo $setor['Cor']; ?>' required>
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>