<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="acao.php" method="post">
        <input type="hidden" name='acao' value='salvar'>
        <input type="hidden" name='id' value=''>
        <label for="nome">Nome</label>
        <input type="text" name='nome' id=''>
        <label for="tetosalarial">Teto Salarial</label>
        <input type="number" name="tetosalarial" id="">
        <input type="submit" value='Cadastrar'>
    </form>
    <a href="./acao.php?acao=excluir&id=2">Excluir</a>
</body>
</html>