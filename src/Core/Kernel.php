<?php

namespace StationCommand\Core;

/**
 * Core application kernel responsible for running agents.
 */
class Kernel
{
    /**
     * @var AgentInterface[]
     */
    private array $agents = [];

    public function registerAgent(AgentInterface $agent): void
    {
        $this->agents[] = $agent;
    }

    public function runTick(): void
    {
        foreach ($this->agents as $agent) {
            $agent->tick();
        }
    }
}
