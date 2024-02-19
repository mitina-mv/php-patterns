<?php
require 'vendor/autoload.php';

use MariaS431\Lr2\FileBase64Decorator;
use MariaS431\Lr2\FileCryptDecorator;

$f1 = new SplFileObject('test.txt', 'w+');
$file = new FileBase64Decorator($f1);
$file->fwrite('Hello World!');
$read = $file->fread();
echo $read;

$f2 = new SplFileObject('test-crypt.txt', 'w+');
$file2 = new FileCryptDecorator($f2, 'KeY123');
$file2->fwrite('Hello! This is secret');
$read = $file2->fread();
echo $read;
