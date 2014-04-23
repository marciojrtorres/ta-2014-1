<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>UM BLOG</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
    
    <h1>NEWS: Nova notícia</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('news', $link) or die ('banco de dados news nao existe');
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];

        $sql = '';

        if ($_FILES['imagem']['error'] <= 0) {
            $extensao = end(explode('.', $_FILES['imagem']['name']));
            $nome = hash('SHA256', $_FILES['imagem']['name']);
            $imagem = $nome . '.' . $extensao;
            move_uploaded_file($_FILES['imagem']['tmp_name'], "imagem/$imagem");
            $sql = "INSERT INTO noticias VALUES (DEFAULT, '$titulo', '$texto', '$nome', '$extensao')";
        } else {
            $sql = "INSERT INTO noticias VALUES (DEFAULT, '$titulo', '$texto', NULL, NULL)";
        }
        
        $noticias = mysql_query($sql, $link);
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="titulo" size="50" maxlength="50" placeholder="titulo">
        <br>
        <textarea name="texto" cols="60" rows="10" placeholder="texto"></textarea>
        <br>
        <input type="file" name="imagem" accept="image/png">
        <br>
        <input type="submit" value="Cadastrar">
    </form>


</body>
</html>