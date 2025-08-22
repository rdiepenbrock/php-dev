<?php

$root = "storage";
$file = 'test.txt';
$contents = 'hello world';
$savePath = "{$root}/{$file}";

mkdir(dirname($savePath), 0777, recursive: true);
file_put_contents($savePath, $contents);