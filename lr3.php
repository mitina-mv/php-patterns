<?php

require_once('./src/Automaton.php');
require_once('./src/StateB.php');

use MariaS432\LR3\Automaton;
use MariaS432\LR3\StateB;

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
