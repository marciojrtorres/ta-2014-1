<?php 
require 'vendor/autoload.php';
// conecta no servidor de cache
Predis\Autoloader::register();
$redis = new Predis\Client();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(function() {
        $('div#detalhes').load('detalhes');
    });
    </script>
</head>
<body>
    
    <a href="postar.php">Postar</a>

    <h1>UM BLOG</h1>

    <img src="logo.jpg" alt="logo do blog">

    <?php
    // pega do cache
    $conteudo = $redis->get('index');
    // se encontrou no cache
    if ($conteudo) {
        echo "conteudo veio do cache";
        // usa o cache (mostra)
        echo $conteudo;
    } else { // se não está no cache: banco
        echo "conteudo veio do banco";

        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
        $sql = "SELECT * FROM posts"; // LIMIT 2 OFFSET " . $offset;    
        $posts = mysql_query($sql, $link);

        ob_start();
    ?>

    <? while ($post = mysql_fetch_assoc($posts)): ?>
    <div class="post">
        <h2><a href="#"><?=$post['titulo']?></a></h2>
        <p>
            <?=$post['texto']?>      
        </p>
    </div>
    <? endwhile ?>

    <?php 
    $conteudo = ob_get_flush();
    // coloca o conteudo no cache
    $redis->set('index',$conteudo);
    $redis->expire('index',10);

    } 
    ?>

    <div id="detalhes">

    </div>
</body>
</html>