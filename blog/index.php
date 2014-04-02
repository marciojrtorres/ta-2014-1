<?php 
$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;

$link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
mysql_select_db('blog', $link) or die ('banco de dados blog nao existe');
$sql = "SELECT * FROM posts LIMIT 2 OFFSET " . $offset;
echo $sql;
$posts = mysql_query($sql, $link);
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
</head>
<body>
    
    <a href="postar.php">Postar</a>

    <h1>UM BLOG</h1>

    <? while ($post = mysql_fetch_assoc($posts)): ?>
    <div class="post">
        <h2><a href="#"><?=$post['titulo']?></a></h2>
        <p>
            <?=$post['texto']?>      
        </p>
    </div>
    <? endwhile ?>

    <? for ($i = 0; $i < 10; $i++): ?>
        <a href="?offset=<?=$i*2?>"><?=$i + 1?></a>
    <? endfor ?>
</body>
</html>