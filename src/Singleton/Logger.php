<?php

declare(strict_types=1);

namespace MariaS431\Lr\Singleton;

use Exception;
use SplFileObject;

final class Logger 
{
    private static ?self $instance = null;

    private static string $logFilePath = __DIR__ . "/log.txt";
    private static int $logCount = 0;

    public static function getInstance() : self
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setLogFilePath(string $filePath) : void
    {
        self::$logFilePath = $filePath;
    }

    public function log(string $message) : void
    {
        $file = new SplFileObject(self::$logFilePath, 'a');
        $date = date('Y-m-d H:i:s');
        $file->fwrite("{$this::$logCount}.\t[$date] $message\n");
        self::$logCount++;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __unserialize(array $data): void
    {
        throw new Exception("Недопустима десериализация объекта");
    }
}
