<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
</head>
<body>
    
    <h1>Galeria</h1>

    <h2>Telas de Erro</h2>

    <a href="imagem/ciee.png" class="nova-janela">CIEE</a>
    <a href="imagem/elsevier.png" class="nova-janela">ELSEVIER CAMPUS</a>
    <a href="imagem/fiat.png" class="nova-janela">FIAT</a>
    <a href="imagem/sefaz.jpg" class="nova-janela">SEFAZ</a>

    <script type="text/javascript">
    links = document.querySelectorAll('a.nova-janela');
    for (var i = 0; i < links.length; i++) {
        links[i].onclick = function() {
            window.open(this.href);
            return false;
        };
    };
    </script>

    <script type="text/javascript" src="um.js"></script>

</body>
</html>