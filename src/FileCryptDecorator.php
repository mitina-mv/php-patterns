<?php 

namespace MariaS431\Lr2;

use SplFileObject;

class FileCryptDecorator
{
    private $file;
    private $pass;
    private $iv;
    private $method;

    public function __construct(
        SplFileObject $file, 
        string $pass, 
        $method = "aes-128-cfb"
    ) {
        $this->file = $file;
        $this->pass = $pass;
        $this->method = $method;

        $iv_length = openssl_cipher_iv_length($this->method);
        $this->iv = openssl_random_pseudo_bytes($iv_length);
    }

    public function fread() 
    {
        $fileSize = $this->file->getSize();

        if ($fileSize > 0) {
            $this->file->rewind();
            $text = $this->file->fread($fileSize);
            $data = $this->decrypt($text);
            return $data;
        } else {
            return null;
        }
    }

    public function fwrite($text) 
    {
        $data = $this->encrypt($text);
        // Перемещение указателя в конец файла
        $this->file->fseek(0, SEEK_END);
        $this->file->fwrite($data);

        clearstatcache(); // сбрасываем кеш, чтобы размер файла актуализировался

        return true;
    }

    
    private function encrypt($data)
    {
        return openssl_encrypt(
            $data, 
            $this->method, 
            $this->pass, 
            0, 
            $this->iv
        );
    }

    private function decrypt($data)
    {
        return openssl_decrypt(
            $data, 
            $this->method, 
            $this->pass, 
            0, 
            $this->iv
        );
    }
}