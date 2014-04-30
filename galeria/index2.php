<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <style type="text/css">
    label {
        display: block;
    }
    div {
        border: 1px solid;
    }
    div#conteudo {
        width: 100%;
        float: left;
    }
    div#esquerda {
        width: 33%;
        float: left;
    }
    div#direita {
        width: 66%;
        float: left;
    }
    </style>
</head>
<body>
    
    <h1>Galeria</h1>

    <h2>Telas de Erro</h2>

    <div id="conteudo">
        <div id="esquerda">
            <form>
                <label>Selecione a imagem da tela de erro:</label>
                <select name="imagem">
                    <option value="">-- SELECIONE --</option>
                    <option value="ciee.png">CIEE</option>
                    <option value="elsevier.png">ELSEVIER CAMPUS</option>
                    <option value="fiat.png">FIAT</option>
                    <option value="sefaz.jpg">SEFAZ</option>
                </select>
                <noscript>
                    <input type="submit" value="Ver">
                </noscript>
            </form>
        </div>
        <div id="direita" style="padding: 0; margin: 0;">
            <? if ($_GET['imagem']): ?>
                <img src="imagem/<?=$_GET['imagem']?>" alt="imagem" 
                    style="max-width: 100%">
            <? else: ?>
                <img src="" alt="imagem" 
                    style="display: none; max-width: 100%">
            <? endif ?>
        </div>
    </div>

    <script type="text/javascript" src="foto.js"></script>
</body>
</html>