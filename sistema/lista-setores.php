<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//comando de SQL para executar
$sql = "SELECT * FROM setor ORDER BY SetorID ASC";

//executa e retorna os dados
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
        
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <?php 
            while ($dado = mysqli_fetch_assoc($resultado)){
          ?>
          <tbody>
            <tr>
              <td><?php echo $dado['SetorID'] ?></td>
              <td><?php echo $dado['Nome'] ?></td>
              <td><?php echo $dado['Andar'] ?></td>
              <td><?php echo $dado['Cor'] ?></td>
              <td>
                <a href="./salvar-setores.php?setorid=<?php echo $dado['SetorID'] ?>" class="btn btn-edit">Editar</a>
                <a href="./action/setores.php?acao=delete&setorid=<?php echo $dado['SetorID'] ?>" class="btn btn-delete">Excluir</a>
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