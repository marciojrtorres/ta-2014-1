<?php
    $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
    mysql_select_db('ajax', $link) 
        or die ('banco de dados ajax nao existe');
    $sql = "SELECT * FROM cidades WHERE id_estado = " 
                . $_GET['id_estado'];
    $cidades = mysql_query($sql, $link);
?>

<option value="0">--selecione--</option>
<? while ($cidade = mysql_fetch_assoc($cidades)): ?>
    <option value="<?=$cidade['id']?>">
        <?=$cidade['nome']?>
    </option>
<? endwhile ?>