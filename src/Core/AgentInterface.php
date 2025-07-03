<?php

namespace StationCommand\Core;

/**
 * Interface for domain agents.
 */
interface AgentInterface
{
    /**
     * Handle logic for a single tick.
     */
    public function tick(): void;
}
