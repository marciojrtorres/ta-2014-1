<?php 
session_start();
if (isset($_SESSION['nome'])) {
    header("location: postar.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
    mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $sql = "SELECT id, nome FROM usuarios WHERE usuario = '" . $usuario . "' AND senha = '" . $senha . "'";
    echo $sql;
    $result = mysql_query($sql, $link);
    $row = mysql_fetch_assoc($result);

    if ($row) {
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['id'] = $row['id'];
        header("location: postar.php");
    } else {
        die('login invalido');
    }

}

 ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>BLOG</title>
</head>
<body>

    <a href="/">Home</a>

    <h1>BLOG</h1>
    <img src="logo.jpg" alt="logo do blog">
    <h2>Login</h2>

    <form method="post">
        <input type="text" id="usuario" name="usuario" placeholder="Nome de usuário">
        <input type="text" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

</body>
</html>