<?php

namespace MariaS431\Lr\State;

class StateB extends State 
{
    public function on(Automaton $automaton) { }

    public function off(Automaton $automaton) 
    {
        $automaton->setState(new StateA());
    }

    public function ack(Automaton $automaton) 
    {
        $automaton->setState(new StateC());
    }

    public function toString()
    {
        return "B";
    }
}