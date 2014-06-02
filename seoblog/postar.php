<?php 
session_start();
if (! isset($_SESSION['nome'])) {
    header("location: login.php");
}

$link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>BLOG:NOVO POST</title>
</head>
<body>
<?php
    if (isset($_SESSION['nome'])) {
        $nome = $_SESSION['nome'];
        echo "Logado como ${nome}";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_REQUEST['titulo'];
        $texto  = $_REQUEST['texto'];
        mysql_query("INSERT INTO posts VALUES ('$titulo', '$texto')", $link);
        echo 'Postado com sucesso';
    }
?>
    <h1>BLOG:NOVO POST</h1>

    <a href="/">Home</a>
    <a href="logout.php">Deslogar</a>

    <form method="post">
        <input type="text" id="titulo" name="titulo">
        <textarea id="texto" name="texto"></textarea>
        <input type="submit" value="Postar">
    </form>



</body>
</html>