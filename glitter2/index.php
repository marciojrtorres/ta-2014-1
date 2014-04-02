<?php 
session_start();
if (isset($_SESSION['id'])) {
    header("location: /home");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
    mysql_select_db('glitter2', $link) or die ('banco de dados glitter nao existe');
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $sql = "SELECT id, nome FROM usuarios WHERE usuario = '" . $usuario . "' AND senha = '" . $senha . "'";
    echo $sql;
    $result = mysql_query($sql, $link);
    $row = mysql_fetch_assoc($result);

    if ($row) {
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['id'] = $row['id'];
        header("location: /home");
    } else {
        die('login invalido');
    }

}

 ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>GLITTER &lt;3 &lt;3 &lt;3</title>
</head>
<body>

    <h1>GLITTER</h1>

    <h2>Login</h2>

    <form method="post">
        <input type="text" id="usuario" name="usuario" placeholder="Nome de usuário">
        <input type="text" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

</body>
</html>