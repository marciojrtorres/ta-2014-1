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

    
    <a href="postar.php">Postar</a>

    <h1>UM BLOG</h1>

    <?php
        // $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        // mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
        // $sql = "SELECT * FROM posts"; // LIMIT 2 OFFSET " . $offset;
        // $posts = mysql_query($sql, $link);
        $client = new couchClient ('http://127.0.0.1:5984','blog');
        $posts = $client->getAllDocs();
    ?>


    <? foreach($posts->rows as $row):  // while ($post = mysql_fetch_assoc($posts)): ?>
    <div class="post">
        <? $post = $client->getDoc($row->id); ?>
        <h2><a href="post.php?id=<?=$row->id?>"><?=$post->titulo?></a></h2>
        <p>
            <?=$post->texto?>
        </p>
    </div>
    <? endforeach // endwhile ?>

</body>
</html>