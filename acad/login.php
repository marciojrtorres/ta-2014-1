<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
    mysql_select_db('acad', $link) or die ('banco de dados acad nao existe');
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $result = mysql_query("SELECT * FROM usuarios WHERE nome = '${nome}' AND senha = '${senha}'", $link);
    $rows = mysql_num_rows($result);
    if ($rows) {
        session_start();
        $_SESSION['usuario'] = $nome;
        header("location: /");
    }
}

 ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>ACAD:login</title>
</head>
<body>

    <a href="/">Home</a>

    <h1>ACAD:login</h1>

    <form method="post">
        <input type="text" id="nome" name=" nome" placeholder="Nome de usuário">
        <input type="text" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

</body>
</html>