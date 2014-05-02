<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
    
    <h1>NEWS: Lista de Notícias</h1>

    <?php
        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('news', $link) or die ('banco de dados news nao existe');

        $sql = 'SELECT * FROM noticias';
        
        $result = mysql_query($sql, $link);
    ?>

    <table>
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Título
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <? while ($n = mysql_fetch_assoc($result)): ?>
            <tr>
                <td>
                    <?= $n['id'] ?>
                </td>
                <td>
                    <?= $n['titulo'] ?>
                </td>
                <td>
                    <button onclick=" if (confirm('excluir?')) window.location='excluir.php?id=<?= $n['id']?>'">
                    Excluir
                    </button> 
                </td>
            </tr>
            <? endwhile ?>
        </tbody>
    </table>

</body>
</html>