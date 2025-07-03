<?php

namespace StationCommand\Modules\ExampleModule;

use StationCommand\Core\AgentInterface;

class ExampleAgent implements AgentInterface
{
    public function tick(): void
    {
        // Placeholder tick logic
        echo "ExampleAgent tick executed\n";
    }
}
