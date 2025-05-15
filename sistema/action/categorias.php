<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

$categoriaid = $_GET['categoriaid'];

// validacao
switch ($acao) {
    case 'salvar':
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        if (empty($categoriaid)){
            $sql_include = "INSERT INTO categorias (Nome, Descricao)
            VALUES('{$nome}','{$descricao}')";

            if ( mysqli_query($conn, $sql_include)){
                header('Location: http://localhost:8080/sistema/lista-categorias.php');
            }
        }
        else{
            $sql_alterate = "UPDATE categorias SET Nome = '$nome', Descricao = '$descricao' WHERE CategoriaID = $categoriaid";

            if ( mysqli_query($conn, $sql_alterate)){
                header('Location: http://localhost:8080/sistema/lista-categorias.php');
            }
        }
        break;

    case 'delete':  
        $sql_delete = "DELETE FROM categorias WHERE CategoriaID='$categoriaid'";

        if ( mysqli_query($conn, $sql_delete)){
            header('Location: http://localhost:8080/sistema/lista-categorias.php');
        }
        break;
    
    default:
        # code...
        break;
}
?>