<?php

namespace MariaS431\Lr\Decorator;

use SplFileObject;

class FileBase64Decorator extends FileDecorator 
{
    
    public function __construct(SplFileObject $file) {
        parent::__construct($file);
    }

    public function fread() 
    {
        $fileSize = $this->file->getSize();

        if ($fileSize > 0) {
            $this->file->rewind();
            $text = $this->file->fread($fileSize);
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
        $this->file->fseek(0, SEEK_END);
        $this->file->fwrite($data);

        clearstatcache(); // сбрасываем кеш, чтобы размер файла актуализировался

        return true;
    }

    public function __toString()
    {
        return $this->file->getPath();
    }
}