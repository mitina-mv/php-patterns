<?php 

namespace MariaS431\Lr\Decorator;

use SplFileObject;

class FileCryptDecorator extends BaseFileDecorator
{
    private $pass;
    private $iv;
    private $method = "aes-128-cfb";

    public function __construct(string $pass, protected BaseFileDecorator $decorator) 
    {
        $this->pass = $pass;

        $iv_length = openssl_cipher_iv_length($this->method);
        $this->iv = openssl_random_pseudo_bytes($iv_length);
    }

    public function fread($fileSize = 0) 
    {
        $fileSize = $this->decorator->getSize();

        if ($fileSize > 0) {
            $this->decorator->rewind();
            $text = $this->decorator->fread($fileSize);
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
        $this->decorator->fseek();
        $this->decorator->fwrite($data);

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