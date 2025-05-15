<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

$cargoid = $_GET['cargoid'];

// validacao
switch ($acao) {
    case 'salvar':
        $nome = $_POST['nome'];
        $teto = $_POST['tetosalarial'];

        if (empty($cargoid)){
            $sql_include = "INSERT INTO cargos (Nome, TetoSalarial)
            VALUES('{$nome}','{$teto}')";

            if ( mysqli_query($conn, $sql_include)){
                header('Location: http://localhost:8080/sistema/lista-cargos.php');
            }
        }
        else{
            $sql_alterate = "UPDATE cargos SET Nome = '$nome', TetoSalarial = '$teto' WHERE CargoID = $cargoid";

            if ( mysqli_query($conn, $sql_alterate)){
                header('Location: http://localhost:8080/sistema/lista-cargos.php');
            }
        }
        break;
    
    case 'delete':  
        $sql_delete = "DELETE FROM cargos WHERE CargoID='$cargoid'";

        if ( mysqli_query($conn, $sql_delete)){
            header('Location: http://localhost:8080/sistema/lista-cargos.php');
        }
        break;

    default:
        //none
        break;
}
?>