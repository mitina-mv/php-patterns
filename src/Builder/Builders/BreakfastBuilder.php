<?php

namespace MariaS431\Lr\Builder\Builders;

use MariaS431\Lr\Builder\Breakfast;

interface BreakfastBuilder 
{
    public function createBreakfast() : void;
    public function addBase() : void;
    public function addDrink() : void;
    public function addAddition() : void;

    public function getBreakfast() : Breakfast;
}