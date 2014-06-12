<?php
require 'vendor/autoload.php';
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>

    <?php
        /*
        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
        $sql = "SELECT * FROM posts WHERE id = " . $_GET['id']; 
        $post = mysql_fetch_assoc(mysql_query($sql, $link));
        */
        $client = new couchClient ('http://127.0.0.1:5984','blog');
        $post = $client->getDoc($_GET['id']);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comentario = new stdClass();
            $comentario->texto = $_REQUEST['comentario'];
            $comentario->autor = $_REQUEST['autor'];
            if (isset($post->comentarios)) {
                $post->comentarios[] = $comentario;
            } else {                
                $post->comentarios = array($comentario);
            }
            $client->storeDoc($post);
            /*
            $id = $_REQUEST['id'];
            $comentario = $_REQUEST['comentario'];
            mysql_query("INSERT INTO comentarios VALUES ($id, '$comentario')", $link);
            */
        }
        
    ?>

    <h2><?= $post->titulo ?></h2>

    <p><?= $post->texto ?></p>

    <form method="post">        
        <label>Autor</label>
        <input type="text" name="autor">
        <label>Comentário:</label>
        <textarea name="comentario"></textarea>
        <input type="submit">
    </form>

    <?php
        /*
        $sql = "SELECT * FROM comentarios WHERE id_post = " . $_GET['id']; 
        $comentarios = mysql_query($sql, $link);
        */
    ?>

    <a href="asdasd" rel="nofollow"></a>

    <? foreach ($post->comentarios as $comentario): // while ($coment = mysql_fetch_assoc($comentarios)): ?>
        <p><?= $comentario->texto ?> por autor <?= isset($comentario->autor) ? $comentario->autor : 'desconhecido' ?></p>        
    <? endforeach // endwhile ?>

</body>
</html>