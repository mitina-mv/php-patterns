<?php
require_once('./vendor/autoload.php');

use MariaS431\Lr\State\Automaton;
use MariaS431\Lr\State\StateB;

$initialState = new StateB();
$automaton = new Automaton($initialState);
$arComands = ['on', 'off', 'off', 'ack', 'ack', 'ack', 'ack', 'on', 'off', 'off'];

foreach($arComands as $comand)
{
    $oldState = get_class($automaton->getCurrentState())[-1];
    $automaton->processCommand($comand);
    $curState = get_class($automaton->getCurrentState())[-1];

    if($oldState == $curState)
    {
        echo "undefined combo \n";
    } else {
        echo "{$oldState}, {$comand} => {$curState} \n";
    }

}
