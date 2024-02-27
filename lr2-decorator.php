<?php
require_once('./vendor/autoload.php');

use MariaS431\Lr\Decorator\BaseFileDecorator;
use MariaS431\Lr\Decorator\FileBase64Decorator;
use MariaS431\Lr\Decorator\FileCryptDecorator;

$f1 = new SplFileObject('test.txt', 'w+');
$baseDecorator = new BaseFileDecorator($f1);

$decorator1 = new FileBase64Decorator($baseDecorator);
$decorator1->fwrite('Hello World encode in base64!');
$read = $decorator1->fread();
echo $read . "\n";


$decorator2 = new FileCryptDecorator('KeY123', $decorator1);
$decorator2->fwrite('Привет! Я закодированный текст!');
$read = $decorator2->fread();
echo $read;
