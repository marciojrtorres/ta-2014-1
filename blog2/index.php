<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>

    <!-- existem várias metatags que facilitam a indexacao -->
    <meta name="keywords" content="tecnologia,java,">
    
    <meta name="description" content="Este blog foi criando ....">    
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

    <a href="sitesduvidosos" rel="nofollow">sites duvidosos</a>

    <img src="logo.jpg" alt="logo do blog">

    <?php
    
        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
        $sql = "SELECT * FROM posts"; // LIMIT 2 OFFSET " . $offset;
        $posts = mysql_query($sql, $link);

    ?>

    <? while ($post = mysql_fetch_assoc($posts)): ?>
    <div class="post">
        <h2><a href="post.php?id=<?=$post['id']?> "><?=$post['titulo']?></a></h2>
        <p>
            <?=$post['texto']?>
        </p>
    </div>
    <? endwhile ?>

    <div id="detalhes">

    </div>
</body>
</html>