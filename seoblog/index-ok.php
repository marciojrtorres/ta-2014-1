<?php 
require 'vendor/autoload.php';
Predis\Autoloader::register();
$client = new Predis\Client();
// $client->set('foo', 'bar');
// $value = $client->get('foo');

// $offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;


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

    $index = $client->get('index');

    if ($index) {
        echo "vindo do cache";
        echo $index;
    } else {

    $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
    mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
    $sql = "SELECT * FROM posts"; // LIMIT 2 OFFSET " . $offset;
    echo $sql;
    $posts = mysql_query($sql, $link);
    
    echo "vindo do banco";

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
    $client->set('index', $conteudo);
    $client->expire('index', 5);

    }
    ?>

    <div id="detalhes">

    </div>
</body>
</html>