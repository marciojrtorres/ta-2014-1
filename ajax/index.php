<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>AJAX</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="jquery.js"></script>

</head>
<body>
    
    <h1>AJAX</h1>

    <?php
        $link = mysql_connect('localhost', 'root', 'root') or die ('banco de dados indisponivel');
        mysql_select_db('ajax', $link) or die ('banco de dados news nao existe');
        $sql = "SELECT * FROM estados";
        $estados = mysql_query($sql, $link);
    ?>

    <form>
        <label>Estado:
        <select name="estado">
            <option value="0">--selecione--</option>
            <? while ($estado = mysql_fetch_assoc($estados)): ?>
            <option value="<?=$estado['id']?>">
                <?=$estado['uf'] ?>
            </option>
            <? endwhile ?>
        </select>
        </label>

        <label>Cidade:
        <select name="cidade">
            <option>-- selecione o cidade --</option>            
        </select>
        </label>        
    </form>

    <script type="text/javascript">
        selCidades = document.querySelector('select[name=cidade]');
        selEstados = document.querySelector('select[name=estado]');
        selEstados.onchange = function() {
            
            // console.log('estado change');

            idEstado = this.value;
            var ajax = new XMLHttpRequest(); // nao func ie <= 8

            // quanto o estado (da requisição ajax) for alterado
            ajax.onreadystatechange = function() {
                console.log(ajax.readyState);
                if (ajax.readyState == 4) { // COMPLETO 
                    if (ajax.status == 200) { // BEM SUCEDIDO
                        selCidades.innerHTML = ajax.responseText;
                    } else {
                        alert('houve um erro: ' + ajax.status);
                    }
                }
            }

            // 3 argumentos:
            // 1: GET, POST, DELETE, PUT
            // 2: URL
            // 3: FLAG ASSÍNCRONO (opcional)
            // ajax.open('DELETE', 'produto.php?id=4', true)
            // ajax.open('POST', 'salva.php', false)
            ajax.open('GET', 'cidades.php?id_estado=' + idEstado); // preparando

            ajax.send(); // enviar

        }
    </script>

</body>
</html>