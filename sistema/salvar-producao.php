<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$producaoid = NULL;

if (!empty($_GET['producaoid'])){
  $producaoid = $_GET['producaoid'];
}

$producao = [
  'FuncionarioID' => '',
  'ProdutoID' => '',
  'DataProducao' => '',
  'DataEntrega' => ''
];

if (!empty($_GET['producaoid'])) {
  $sql = "SELECT * FROM producao WHERE ProducaoID = $producaoid";
  $resultado = mysqli_query($conn,$sql);
  $producao = mysqli_fetch_assoc($resultado) ?: $producao;
};

?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/producao.php?acao=salvar&producaoid=<?php echo $producaoid ?>">
          <h2><?php echo empty($producao['ProducaoID']) ? 'Cadastro' : 'Edição'; ?> de Produção de Produtos</h2>
          <input type="hidden" name='id' value='<?php echo $producao['ProducaoID']; ?>'>
          <select name='funcionairo'>
            <option value="">Funcionário</option>
            <?php 
              $sql_funcionarios = "SELECT * FROM funcionarios";
              $resultado_funcionarios = mysqli_query($conn,$sql_funcionarios);
              while ($funcionario = mysqli_fetch_assoc($resultado_funcionarios)){
            ?>
            <option value="<?php echo $funcionario['FuncionarioID'] ?>"<?php if (!empty($funcionario['FuncionarioID']) && $funcionario['FuncionarioID'] == $producao['FuncionarioID'] ){echo 'selected';} ?>><?php echo $funcionario['Nome'] ?></option>
            <?php
            }
            ?>
          </select>
          <select name='produto'>
            <option value="">Produto</option>
            <?php 
              $sql_produtos = "SELECT * FROM produtos";
              $resultado_produtos = mysqli_query($conn,$sql_produtos);
              while ($produto = mysqli_fetch_assoc($resultado_produtos)){
            ?>
            <option value="<?php echo $produto['ProdutoID'] ?>"<?php if (!empty($produto['ProdutoID']) && $producao['ProdutoID'] == $produto['ProdutoID'] ){echo 'selected';} ?>><?php echo $produto['Nome'] ?></option>
            <?php
            }
            ?>
          </select>
          <label for="">Data da produção</label>
          <input type="date" placeholder="Data da Produção" name='dataProducao' value='<?php echo $producao['DataProducao']; ?>' required>

          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega" name='dataEntrega' value='<?php echo $producao['DataEntrega']; ?>' required>

          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>