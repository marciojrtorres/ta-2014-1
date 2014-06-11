<?php

$files = array();
$content = "";

foreach (array_keys($_GET) as $key) {
    $file = 'css/' . $key . '.css';
    $content = $content . "\n" . file_get_contents($file);
}

$content = preg_replace("/\s{2,}/", '', $content);

$content = preg_replace("/\{\s/", '{', $content);

$content = preg_replace("/\s\{/", '{', $content);

$content = preg_replace("/:\s/", ':', $content);

$content = preg_replace("/\n/", '', $content);

echo $content;

$expires = 3600;
header('Content-type: text/css');
header('Cache-Control: maxage=' . $expires);
header('Last-Modified: ' . gmdate('D, d M Y H:i:s \G\M\T', time()));
header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $expires));
