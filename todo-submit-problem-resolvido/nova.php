<?php 
session_start();

// PASSO 2, VALIDAR:
// para salvar, alterar e excluir, o request method esperado
// é sempre POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // procurar o token submetido na sessão
    $form_token = array_search($_POST['token'], $_SESSION['tokens']);
    
    // o token foi encontrado?
    if ($form_token !== false) {
        // se sim: remove da sessão
        unset($_SESSION['tokens'][$form_token]);
    } else {
        // se não: nega a operação
        die("ja foi salvo antes");
    }

    @mysql_connect('localhost', 'root', 'root') 
        or die ('banco de dados indisponivel');
    @mysql_select_db('todo')
        or die ("banco de dados nao existe");
    $descricao = $_REQUEST["descricao"];
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

    <?php
        // PASSO 1, PREPARAR:
        // gera o token, para o exemplo foi usado um misto de funções
        // mas existem outras abordagens
        $token = hash('sha256',uniqid(rand(),true));
        // colocar o token na sessão (ou outro meio recuperável após a submissão)
        $_SESSION['tokens'][] = $token;        
    ?>

    <h1>Nova Tarefa</h1>

    <a href="nova.php">Nova Tarefa</a>
    <a href="lista.php">Lista de Tarefas</a>
    
    <form method="post">        
        <!-- embutir um campo hidden com o token, ele será validado na submissão -->
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="text" id="descricao" name="descricao" placeholder="Descrição">
        <input type="submit" value="Criar">
    </form>

</body>
</html>