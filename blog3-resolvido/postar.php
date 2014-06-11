<?php
require 'vendor/autoload.php';

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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $client = new couchClient ('http://127.0.0.1:5984','blog');
        $post = new stdClass();
        $post->titulo = $_REQUEST['titulo'];
        $post->texto  = $_REQUEST['texto'];
        try {
            $client->storeDoc($post);
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage();
        }
        // $titulo = $_REQUEST['titulo'];
        // $texto  = $_REQUEST['texto'];
        // mysql_query("INSERT INTO posts VALUES ('$titulo', '$texto')", $link);
        // echo 'Postado com sucesso';
    }
?>
    <h1>BLOG:NOVO POST</h1>

    <a href="index.php">Home</a>

    <form method="post">
        <input type="text" id="titulo" name="titulo">
        <textarea id="texto" name="texto"></textarea>
        <input type="submit" value="Postar">
    </form>



</body>
</html>