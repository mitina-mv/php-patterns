<?php

namespace MariaS431\Lr\State;

class Automaton {
    private State $currentState;

    public function __construct(State $initialState) {
        $this->currentState = $initialState;
    }

    public function processCommand(string $command): void {
        switch ($command) {
            case 'on':
                $this->currentState = $this->currentState->on();
                break;
            case 'off':
                $this->currentState = $this->currentState->off();
                break;
            case 'ack':
                $this->currentState = $this->currentState->ack();
                break;
            default:
                echo "Invalid command: $command\n";
        }
    }

    public function getCurrentState(): State {
        return $this->currentState;
    }
}
