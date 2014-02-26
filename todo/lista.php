<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
</head>
<body>

    <h1>Lista de Tarefas</h1>

    <a href="nova.php">Nova Tarefa</a>
    <a href="lista.php">Lista de Tarefas</a>

<?php
    @mysql_connect('localhost', 'root', 'root') 
        or die ('banco de dados indisponivel');
    @mysql_select_db('todo')
        or die ("banco de dados nao existe");
    
    $result = mysql_query("SELECT * FROM tarefas");
?>

    <table>
        <thead>
            <tr>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <? while ($row = mysql_fetch_assoc($result)): ?>
            <tr>
                <td><?=$row['descricao']?></td>
            </tr>
            <? endwhile ?>
        </tbody>
    </table>

</body>
</html>