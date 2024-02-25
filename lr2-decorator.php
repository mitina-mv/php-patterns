<?php
require_once('./vendor/autoload.php');

use MariaS431\Lr\Decorator\FileBase64Decorator;
use MariaS431\Lr\Decorator\FileCryptDecorator;

$f1 = new SplFileObject('test.txt', 'w+');
$file = new FileBase64Decorator($f1);
$file->fwrite('Hello World encode in base64!');
$read = $file->fread();
echo $read . "\n";

$f2 = new SplFileObject('test-crypt2.txt', 'w+');
$file2 = new FileCryptDecorator($file, 'KeY123');
// $file2->fwrite('Привет! Я закодированный текст!');
$file2->fwrite($file);
$read = $file2->fread();
echo $read;
