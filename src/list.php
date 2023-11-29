<?php

if($argc != 3) {
    echo "Syntax: \n";
    echo "php src/list.php FILENAME TAGNAME \n";
    echo "For example: \n";
    echo "php src/list.php myxml.txml location \n";
    exit(1);
}

$filename = $argv[1];
$tagname  = $argv[2];

$reader = new XMLReader();
$reader->open($filename);
$doc = new DOMDocument;

while ($reader->read() && $reader->name !== $tagname);
while ($reader->name === $tagname)
{
    $node = simplexml_import_dom($doc->importNode($reader->expand(), true));
    var_dump($node);
    $reader->next($tagname);
}

echo 1;