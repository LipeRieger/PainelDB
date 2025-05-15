<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

$produtoid = $_GET['produtoid'];

// validacao
switch ($acao) {
    case 'salvar':
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $peso = $_POST['peso'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];

        if (empty($produtoid)){
            $sql_include = "INSERT INTO produtos (Nome, Preco, Peso, Descricao, CategoriaID)
            VALUES('{$nome}','{$preco}','{$peso}','{$descricao}','{$categoria}')";

            if ( mysqli_query($conn, $sql_include)){
                header('Location: http://localhost:8080/sistema/lista-produtos.php');
            }
        }
        else{
            $sql_alterate = "UPDATE produtos SET Nome = '$nome', Preco = '$preco', Peso = '$peso', Descricao = '$descricao', CategoriaID = '$categoria' WHERE ProdutoID = $produtoid";

            if ( mysqli_query($conn, $sql_alterate)){
                header('Location: http://localhost:8080/sistema/lista-produtos.php');
            }
        }
        break;

    case 'delete':
        $sql_delete = "DELETE FROM produtos WHERE ProdutoID='$produtoid'";

        if ( mysqli_query($conn, $sql_delete)){
            header('Location: http://localhost:8080/sistema/lista-produtos.php');
        }

        break;
    
    default:
        # code...
        break;
}
?>