<?php
$link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
mysql_select_db('news', $link) or die ('banco de dados news nao existe');

$sql = 'DELETE FROM noticias WHERE id = ' . $_REQUEST['id'];

$result = mysql_query($sql, $link);

header('location: lista.php');