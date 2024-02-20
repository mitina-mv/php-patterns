<?php 

namespace MariaS431\Lr\State;

class StateC extends State 
{
    public function on(Automaton $automaton) {}

    public function off(Automaton $automaton) {}

    public function ack(Automaton $automaton) 
    {
        $automaton->setState(new StateB());
    }
    
    public function toString()
    {
        return "C";
    }
}