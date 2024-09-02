<?php

namespace MariaS431\Lr\Builder\Builders;

use MariaS431\Lr\Builder\Parts\Additional;
use MariaS431\Lr\Builder\Parts\Base;
use MariaS431\Lr\Builder\Parts\Drink;
use MariaS431\Lr\Builder\VIP;

class VIPBuilder implements BreakfastBuilder
{
    private VIP $breakfast;

    public function createBreakfast() : void
    {
        $this->breakfast = new VIP();
    }
    
    public function addBase() : void
    {
        $this->breakfast->setPart('base-1', new Base('яичница с беконом'));
        $this->breakfast->setPart('base-2', new Base('запеченые бобы'));
    }
    
    public function addDrink() : void
    {
        $this->breakfast->setPart('drink-1', new Drink('кофе с молоком'));
        $this->breakfast->setPart('drink-2', new Drink('сок апельсиновый'));
    }
    public function addAddition() : void
    {
        $this->breakfast->setPart('add-1', new Additional('тост'));
        $this->breakfast->setPart('add-2', new Additional('масло'));
        $this->breakfast->setPart('add-3', new Additional('помидоры на гриле'));
        $this->breakfast->setPart('add-4', new Additional('лорнская колбаса'));
    }
    
    public function getBreakfast() : VIP
    {
        return $this->breakfast;
    }
}