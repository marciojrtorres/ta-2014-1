<?php
    $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
    mysql_select_db('news', $link) or die ('banco de dados news nao existe');
    $titulo = $_GET['titulo'];
    $id = $_GET['id'];
    $sql = "UPDATE noticias SET titulo = '$titulo' WHERE id = $id";
    mysql_query($sql, $link);
    echo "Titulo atualizado com sucesso";
?>