<?php

declare(strict_types=1);

namespace MariaS431\Test\Singleton;

use MariaS431\Lr\Singleton\Logger;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase 
{
    public function testUniqueness()
    {
        $first = Logger::getInstance();
        $second = Logger::getInstance();

        $this->assertInstanceOf(Logger::class, $first);
        $this->assertSame($first, $second);
    }

    public function testLogMessage()
    {
        file_put_contents(__DIR__.'/../../src/Singleton/log.txt', '');
        $initialLineCount = $this->getLogFileLineCount();

        $firstLogger = Logger::getInstance();

        $firstLogger->log('Первая строка лога');
        $firstLogger->log('Вторая строка лога');

        $secondLogger = Logger::getInstance();
        $secondLogger->log('Еще одна строка лога');

        $finalLineCount = $this->getLogFileLineCount();

        $this->assertEquals($initialLineCount + 3, $finalLineCount);
    }

    private function getLogFileLineCount(): int
    {
        $logFile = new \SplFileObject(__DIR__.'/../../src/Singleton/log.txt', 'r');
        $logFile->seek(PHP_INT_MAX);
        return $logFile->key() + 1;
    }
}
