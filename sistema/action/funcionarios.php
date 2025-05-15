<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

$funcionarioid = $_GET['funcionarioid'];

// validacao
switch ($acao) {
    case 'salvar':
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $email = $_POST['email'];
        $salario = $_POST['salario'];
        $sexo = $_POST['sexo'];
        $CPF = $_POST['CPF'];
        $RG = $_POST['RG'];
        $cargo = $_POST['cargo'];
        $setor = $_POST['setor'];

        if (empty($funcionarioid)){
            $sql_include = "INSERT INTO funcionarios (Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID)
            VALUES('{$nome}','{$dataNascimento}','{$email}','{$salario}','{$sexo}','{$CPF}','{$RG}','{$cargo}','{$setor}')";

            if ( mysqli_query($conn, $sql_include)){
                header('Location: http://localhost:8080/sistema/lista-funcionarios.php');
            }
        }
        else{
            $sql_alterate = "UPDATE funcionarios SET Nome = '$nome', DataNascimento = '$dataNascimento', Email = '$email', Salario = '$salario', Sexo = '$sexo', CPF = '$CPF', RG = '$RG', CargoID = '$cargo', SetorID = '$setor'  WHERE FuncionarioID = $funcionarioid";

            if ( mysqli_query($conn, $sql_alterate)){
                header('Location: http://localhost:8080/sistema/lista-funcionarios.php');
            }
        }
        break;
    
    case 'delete':
        $sql_delete = "DELETE FROM funcionarios WHERE FuncionarioID='$funcionarioid'";

        if ( mysqli_query($conn, $sql_delete)){
            header('Location: http://localhost:8080/sistema/lista-funcionarios.php');
        }

        break;

    default:
        # code...
        break;
}
?>