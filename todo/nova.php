<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    @mysql_connect('localhost', 'root', 'root') 
        or die ('banco de dados indisponivel');
    @mysql_select_db('todo')
        or die ("banco de dados nao existe");
    $descricao = $_POST["descricao"];
    mysql_query("INSERT INTO tarefas VALUES ('${descricao}')");
    include("lista.php");
    die;
}

 ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Nova</title>
</head>
<body>

    <h1>Nova Tarefa</h1>

    <a href="nova.php">Nova Tarefa</a>
    <a href="lista.php">Lista de Tarefas</a>
    
    <form method="post">
        <input type="text" id="descricao" name="descricao" placeholder="Descrição">
        <input type="submit" value="Criar">
    </form>

</body>
</html>