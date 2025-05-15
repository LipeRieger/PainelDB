<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

$producaoid = $_GET['producaoid'];

// validacao
switch ($acao) {
    case 'salvar':
        $funcionario = $_POST['funcionario'];
        $produto = $_POST['produto'];
        $dataProducao = $_POST['dataProducao'];
        $dataEntrega = $_POST['dataEntrega'];

        if (empty($producaoid)){
            $sql_include = "INSERT INTO producao (FuncionarioID, ProdutoID, DataProducao, DataEntrega)
            VALUES('{$funcionario}','{$produto}','{$dataProducao}','{$dataEntrega}')";

            if ( mysqli_query($conn, $sql_include)){
                header('Location: http://localhost:8080/sistema/lista-producao.php');
            }
        }
        else{
            $sql_alterate = "UPDATE producao SET FuncionarioID = '$funcionario', ProdutoID = '$produto', dataProducao = '$dataProducao', dataEntrega = '$dataEntrega' WHERE ProducaoID = $producaoid";

            if ( mysqli_query($conn, $sql_alterate)){
                header('Location: http://localhost:8080/sistema/lista-producao.php');
            }
        }
        break;

    case 'delete':
        $sql_delete = "DELETE FROM producao WHERE ProducaoID='$producaoid'";

        if ( mysqli_query($conn, $sql_delete)){
            header('Location: http://localhost:8080/sistema/lista-producao.php');
        }

        break;
    
    default:
        # code...
        break;
}
?>