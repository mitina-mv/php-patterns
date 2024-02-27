<?php

namespace MariaS431\Lr\Decorator;

use SplFileObject;

class FileBase64Decorator extends BaseFileDecorator 
{
    public function __construct(protected BaseFileDecorator $decorator) {}

    public function fread($fileSize = 0) 
    {
        $fileSize = $this->decorator->file->getSize();

        if ($fileSize > 0) {
            $this->decorator->rewind();
            $text = $this->decorator->fread($fileSize);
            $data = base64_decode($text);
            return $data;
        } else {
            return null;
        }
    }

    public function fwrite($text) 
    {
        $data = base64_encode($text);
        // Перемещение указателя в конец файла
        $this->decorator->fseek();
        $this->decorator->fwrite($data);

        clearstatcache(); // сбрасываем кеш, чтобы размер файла актуализировался

        return true;
    }

    public function fseek()
    {
        $this->decorator->fseek();
    }

    public function rewind()
    {
        $this->decorator->rewind();
    }

    public function getSize()
    {
        return $this->decorator->getSize();
    }
}