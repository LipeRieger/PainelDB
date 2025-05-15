<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

$setorid = $_GET['setorid'];

// validacao
switch ($acao) {
    case 'salvar':
        $nome = $_POST['nome'];
        $andar = $_POST['andar'];
        $cor = $_POST['cor'];

        if (empty($setorid)){
            $sql_include = "INSERT INTO setor (Nome, Andar, Cor)
            VALUES('{$nome}','{$andar}', '{$cor}')";

            if ( mysqli_query($conn, $sql_include)){
                header('Location: http://localhost:8080/sistema/lista-setores.php');
            }
        }
        else{
            $sql_alterate = "UPDATE setor SET Nome = '$nome', Andar = '$andar', Cor = '$cor' WHERE SetorID = $setorid";

            if ( mysqli_query($conn, $sql_alterate)){
                header('Location: http://localhost:8080/sistema/lista-setores.php');
            }
        }
        break;
    
    case 'delete':  
        $sql_delete = "DELETE FROM setor WHERE SetorID='{$setorid}'";

        if ( mysqli_query($conn, $sql_delete)){
            header('Location: http://localhost:8080/sistema/lista-setores.php');
        }
        break;

    default:
        //none
        break;
}
?>