<?php

// Variáveis capturadas
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// Validação da ação
switch ($acao) {
    case 'excluir':
        exit('código Delete');
        break;

    case 'salvar':
        if (isset($id) && !empty($id)) {
            exit('código Update');
        }else {
            exit('código Insert Into');
        }
        break;
    
    default:
        # code...
        break;
}

?>