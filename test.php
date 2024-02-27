<?php

class BaseFileDecorator
{
    public function __construct(protected SplFileObject $file) { }

    public function current()
    {
        return $this->file->current();
    }
}

class UppercaseDecorator extends BaseFileDecorator
{
    public function __construct(protected BaseFileDecorator $decorator) { }

    public function current()
    {
        $line = $this->decorator->current();
        return strtoupper($line);
    }
}

class NestedDecorator extends BaseFileDecorator
{
    public function __construct(protected BaseFileDecorator $decorator) { }

    public function current()
    {
        $line = $this->decorator->current();
        return "Nested: " . $line;
    }
}

// Пример использования
$filename = 'test.txt';
$file = new SplFileObject($filename, 'r');
$baseDecorator = new BaseFileDecorator($file);
$uppercaseFile = new UppercaseDecorator($baseDecorator);
echo $uppercaseFile->current();
$nestedUppercaseFile = new NestedDecorator($uppercaseFile);
echo $nestedUppercaseFile->current();
