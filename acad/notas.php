<?php 
// salva guarda
session_start();
if (! isset($_SESSION['usuario'])) {
    die('eh necessario estar logado para ver essa pagina');
}

$link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
mysql_select_db('acad', $link) or die ('banco de dados acad nao existe');
   
if ($_REQUEST['acao'] == 'atualiza') {
    $nota = $_REQUEST['nota'];
    $id_aluno = $_REQUEST['id_aluno'];
    mysql_query("UPDATE alunos SET nota = $nota WHERE id_aluno = $id_aluno");
}

$result = mysql_query("SELECT * FROM alunos ORDER BY nome", $link);
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>ACAD:notas</title>
</head>
<body>
<?php
    if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "Logado como ${usuario}";
    }
?>
    <h1>ACAD:notas</h1>

    <?=$_SERVER['HTTP_REFERER']?>

    <a href="/">Home</a>
    <a href="logout.php">Deslogar</a>

    <? while ($row = mysql_fetch_assoc($result)): ?>
    <div>
        <strong><?=$row['nome']?></strong>
        <form>
            <input type="hidden" id="acao" name="acao" value="atualiza">
            <input type="hidden" id="id_aluno" name="id_aluno" value="<?=$row['id_aluno']?>">
            <input type="text" id="nota" name="nota" value="<?=$row['nota']?>">
            <input type="submit" value="Atualizar">
        </form>
    </div>
    

    <? endwhile ?>
    

</body>
</html>