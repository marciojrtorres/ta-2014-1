<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>

</head>
<body>
    
    <h1>NEWS</h1>

    <?php
        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('news', $link) or die ('banco de dados news nao existe');
        $sql = "SELECT * FROM noticias";
        $noticias = mysql_query($sql, $link);
    ?>

    <? while ($noticia = mysql_fetch_assoc($noticias)): ?>
    <div class="noticia">

        <div class="titulo">
            <h2><?=$noticia['titulo']?></h2>
        </div>

        <? if ($noticia['imagem']): ?>
        <div class="imagem">
            <img width="320" height="240" src="imagem/<?=$noticia['imagem']?>.<?=$noticia['extensao']?>">
        </div>
        <? endif ?>

        <div class="texto">
            <p><?=$noticia['texto']?></p>
        </div>

    </div>
    <? endwhile ?>



</body>
</html>