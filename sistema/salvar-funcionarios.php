<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$funcionarioid = NULL;

if (!empty($_GET['funcionarioid'])){
  $funcionarioid = $_GET['funcionarioid'];
}

$funcionario = [
  'FuncionarioID' => '',
  'Nome' => '',
  'DataNascimento' => '',
  'Email' => '',
  'Salario' => '',
  'Sexo' => '',
  'CPF' => '',
  'RG' => '',
  'Cargo' => '',
  'Setor' => ''
];

if (!empty($_GET['funcionarioid'])) {
  $sql = "SELECT * FROM funcionarios WHERE FuncionarioID = $funcionarioid";
  $resultado = mysqli_query($conn,$sql);
  $funcionario = mysqli_fetch_assoc($resultado) ?: $funcionario;
};

?>

  
  <main>

    <div id="funcionarios" class="tela">
        <form class="crud-form" action='./action/funcionarios.php?acao=salvar&funcionarioid=<?php echo $funcionarioid ?>' method='post'>
          <h2><?php echo empty($funcionario['FuncionarioID']) ? 'Cadastro' : 'Edição'; ?> de Funcionários</h2>
          <input type="hidden" name='id' value='<?php echo $funcionario['FuncionarioID']; ?>'>
          <input type="text" placeholder="Nome" name='nome' value='<?php echo $funcionario['Nome']; ?>' required>
          <input type="date" placeholder="Data de Nascimento" name='dataNascimento' value='<?php echo $funcionario['DataNascimento']; ?>' required>
          <input type="email" placeholder="Email" name='email' value='<?php echo $funcionario['Email']; ?>' required>
          <input type="number" placeholder="Salário" name='salario' value='<?php echo $funcionario['Salario']; ?>' required>

          <select name='sexo'>
            <option value=''>Sexo</option>
            <option value="M" <?php if ($funcionario['Sexo'] == 'M' ){echo 'selected';} ?>>Masculino</option>
            <option value="F" <?php if ($funcionario['Sexo'] == 'F'){echo 'selected';} ?>>Feminino</option>
          </select>
          <input type="text" placeholder="CPF" name='CPF' value='<?php echo $funcionario['CPF']; ?>' required>
          <input type="text" placeholder="RG" name='RG' value='<?php echo $funcionario['RG']; ?>' required>

          <select name='cargo'>
            <option value="">Cargo</option>
            <?php 
              $sql_cargos = "SELECT * FROM cargos";
              $resultado_cargos = mysqli_query($conn,$sql_cargos);
              while ($cargo = mysqli_fetch_assoc($resultado_cargos)){
            ?>
            <option value="<?php echo $cargo['CargoID'] ?>"<?php if (!empty($funcionario['CargoID']) && $cargo['CargoID'] == $funcionario['CargoID'] ){echo 'selected';} ?>><?php echo $cargo['Nome'] ?></option>
            <?php
            }
            ?>
          </select>

          <select name='setor'>
            <option value="">Setor</option>
            <?php 
              $sql_setores = "SELECT * FROM setor";
              $resultado_setores = mysqli_query($conn,$sql_setores);
              while ($setores = mysqli_fetch_assoc($resultado_setores)){
            ?>
            <option value="<?php echo $setores['SetorID'] ?>"<?php if (!empty($funcionario['SetorID']) && $setores['SetorID'] == $funcionario['SetorID'] ){echo 'selected';} ?>><?php echo $setores['Nome'] ?></option>
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
