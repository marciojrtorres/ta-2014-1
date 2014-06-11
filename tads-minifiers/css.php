<?php

$files = array();
$conteudo = "";

foreach (array_keys($_GET) as $key) {
    $file = 'css/' . $key . '.css';
    $conteudo = $conteudo . "\n" . file_get_contents($file);
}

// $file = 'css/' . array_keys($_GET)[0] . '.css';

// $conteudo = file_get_contents($file);

// perl regex replace
$conteudo = preg_replace("/\s\{/","{", $conteudo);
$conteudo = preg_replace("/\{\s/","{", $conteudo);
$conteudo = preg_replace("/\}\s/","}", $conteudo);
$conteudo = preg_replace("/\s{2,}/"," ", $conteudo);
$conteudo = preg_replace("/:\s/",":", $conteudo);
$conteudo = preg_replace("/\n+/","", $conteudo);

// $content = preg_replace("/\s{2,}/", '', $content);

// $content = preg_replace("/\{\s/", '{', $content);

// $content = preg_replace("/\s\{/", '{', $content);

// $content = preg_replace("/:\s/", ':', $content);

// $content = preg_replace("/\n/", '', $content);

echo $conteudo;

$expires = 3600;
header('Content-type: text/css');
header('Cache-Control: maxage=' . $expires);
header('Last-Modified: ' . gmdate('D, d M Y H:i:s \G\M\T', time()));
header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $expires));
