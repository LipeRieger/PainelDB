<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//comando de SQL para executar
$sql = "SELECT pc.ProducaoID, pd.Nome AS PDNome, DATE_FORMAT(STR_TO_DATE(pc.DataProducao, '%Y-%m-%d'), '%d/%m/%Y') AS DataProduc, pc.ClienteID, c.Nome AS CNome, f.Nome AS FNome FROM producao AS pc
INNER JOIN produtos AS pd ON pc.ProdutoID = pd.ProdutoID
INNER JOIN clientes AS c ON pc.ClienteID = c.ClienteID
INNER JOIN funcionarios AS f ON pc.FuncionarioID = f.FuncionarioID
ORDER BY pc.ProducaoID ASC";

//executa e retorna os dados
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Cliente</th>
              <th>Funcionario</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <?php 
            while ($dado = mysqli_fetch_assoc($resultado)){
          ?>
          <tbody>
            <tr>
              <td><?php echo $dado['ProducaoID'] ?></td>
              <td><?php echo $dado['PDNome'] ?></td>
              <td><?php echo $dado['CNome'] ?></td>
              <td><?php 
              $fNome = explode(" ",$dado['FNome']);
              
              echo  $fNome[0].' '.$fNome[1]?></td>
              <td><?php echo $dado['DataProduc'] ?></td>
              <td>
                <a href="./salvar-producao.php?producaoid=<?php echo $dado['ProducaoID']?>" class="btn btn-edit">Editar</a>
                <a href="./action/producao.php?acao=delete&producaoid=<?php echo $dado['ProducaoID'] ?>" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
          </tbody>
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