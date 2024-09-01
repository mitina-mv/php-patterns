<?php

declare(strict_types=1);

namespace MariaS431\Lr\Singleton;

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
        $firstLogger = Logger::getInstance();

        $firstLogger->log('Первая строка лога');
        $firstLogger->log('Вторая строка лога');

        $secondLogger = Logger::getInstance();
        $secondLogger->log('Еще одна строка лога');
    }
}
