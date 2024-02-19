<?php 

namespace MariaS431\Lr2;

use SplFileObject;

class FileCryptDecorator {
    private $file;
    private $key;

    public function __construct(SplFileObject $file, string $pass) {
        $this->file = $file;
        $this->key = Key::createNewRandomKey(); // генерация ключа из пароля
    }

    public function fread() 
    {
        $fileSize = $this->file->getSize();

        if ($fileSize > 0) {
            $this->file->rewind();
            $text = $this->file->fread($fileSize);
            $data = Crypto::decrypt($text, $this->key);
            return $data;
        } else {
            return null;
        }
    }

    public function fwrite($text) 
    {
        $data = Crypto::encrypt($text, $this->key);
        echo "455".$data;
        // Перемещение указателя в конец файла
        $this->file->fseek(0, SEEK_END);
        $this->file->fwrite($data);

        clearstatcache(); // сбрасываем кеш, чтобы размер файла актуализировался

        return true;
    }
}