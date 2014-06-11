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

        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
        $sql = "SELECT * FROM posts WHERE id = " . $_GET['id']; 
        $post = mysql_fetch_assoc(mysql_query($sql, $link));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_REQUEST['id'];
            $comentario = $_REQUEST['comentario'];
            mysql_query("INSERT INTO comentarios VALUES ($id, '$comentario')", $link);
        }
        
    ?>

    <h2><?= $post['titulo'] ?></h2>

    <p><?= $post['texto'] ?></p>

    <form method="post">        
        <label>Comentário:</label>
        <textarea name="comentario"></textarea>
        <input type="submit">
    </form>

    <?php
        $sql = "SELECT * FROM comentarios WHERE id_post = " . $_GET['id']; 
        $comentarios = mysql_query($sql, $link);
    ?>

    <a href="asdasd" rel="nofollow"></a>

    <? while ($coment = mysql_fetch_assoc($comentarios)): ?>
        <p><?= $coment['comentario'] ?></p>        
    <? endwhile ?>

</body>
</html>