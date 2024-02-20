<?php
require_once('./vendor/autoload.php');

use MariaS431\Lr\State\Automaton;
use MariaS431\Lr\State\StateB;

$initialState = new StateB();
$automaton = new Automaton($initialState);
$arComands = ['on', 'off', 'off', 'ack', 'ack', 'ack', 'ack', 'on', 'off', 'off'];

foreach($arComands as $command)
{
    $oldState = $automaton->getCurrentState();
    
    switch ($command) {
        case 'on':
            $automaton->on();
            break;
        case 'off':
            $automaton->off();
            break;
        case 'ack':
            $automaton->ack();
            break;
        default:
            echo "Invalid command: $command\n";
    }
    
    
    $curState = $automaton->getCurrentState();

    if($oldState == $curState)
    {
        echo "undefined combo \n";
    } else {
        echo "{$oldState}, {$command} => {$curState} \n";
    }
}
