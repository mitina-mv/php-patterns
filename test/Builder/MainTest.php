<?php

declare(strict_types=1);

namespace MariaS431\Test\Builder;

use MariaS431\Lr\Builder\Builders\EconomyBuilder;
use MariaS431\Lr\Builder\Builders\StandartBuilder;
use MariaS431\Lr\Builder\Builders\VIPBuilder;
use MariaS431\Lr\Builder\Economy;
use MariaS431\Lr\Builder\Kitchener;
use MariaS431\Lr\Builder\Standart;
use MariaS431\Lr\Builder\VIP;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase 
{
    public function testEconomyBuilder()
    {
        $builder = new EconomyBuilder();
        $breakfast = (new Kitchener())->build($builder);

        $this->assertInstanceOf(Economy::class, $breakfast);
        $this->assertSame(['base-1', "drink-1", "add-1", "add-2"], array_keys($breakfast->structure));
    }

    public function testStandartBuilder()
    {
        $builder = new StandartBuilder();
        $breakfast = (new Kitchener())->build($builder);

        $this->assertInstanceOf(Standart::class, $breakfast);
        $this->assertSame(['base-1','base-2', "drink-1", "add-1", "add-2", "add-3"], array_keys($breakfast->structure));
    }
    
    public function testVIPBuilder()
    {
        $builder = new VIPBuilder();
        $breakfast = (new Kitchener())->build($builder);

        $this->assertInstanceOf(VIP::class, $breakfast);
        $this->assertSame(['base-1','base-2', "drink-1", "drink-2", "add-1", "add-2", "add-3", "add-4"], array_keys($breakfast->structure));
    }
}
