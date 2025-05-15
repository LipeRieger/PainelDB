<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//comando de SQL para executar
$sql = "SELECT CargoID, Nome, CONCAT('R$ ', FORMAT(TetoSalarial, 2, 'de_DE')) AS TetoSalar FROM cargos ORDER BY CargoID ASC";

//executa e retorna os dados
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Teto Salárial</th>
              <th>Ações</th>
            </tr>
          </thead>
          <?php
            while ($dado = mysqli_fetch_assoc($resultado)){
          ?>
          <tbody>
            <tr>
              <td><?php echo $dado['CargoID'] ?></td>
              <td><?php echo $dado['Nome'] ?></td>
              <td><?php echo $dado['TetoSalar'] ?></td>
              <td>
                <a href="./salvar-cargos.php?cargoid=<?php echo $dado['CargoID']?>" class="btn btn-edit">Editar</a>
                <a href="./action/cargos.php?acao=delete&cargoid=<?php echo $dado['CargoID'] ?>" class="btn btn-delete">Excluir</a>
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