<?php

namespace StationCommand\Modules\ResourceModule;

use StationCommand\Core\AgentInterface;

/**
 * Handles basic resource management and mining expeditions.
 */
class ResourceAgent implements AgentInterface
{
    private array $resources = [
        'iron' => 100,
        'titan' => 100,
        'silica' => 100,
        'copper' => 100,
        'h2o' => 100,
        'water' => 100,
        'uran_deuterium' => 50,
    ];

    public function tick(): void
    {
        // Cost to run a mining expedition
        $cost = ['h2o' => 2];
        foreach ($cost as $res => $amount) {
            if ($this->resources[$res] < $amount) {
                echo "Not enough {$res} to run mining expedition\n";
                return;
            }
        }
        foreach ($cost as $res => $amount) {
            $this->resources[$res] -= $amount;
        }

        $asteroidTypes = [
            'iron',
            'titan',
            'silica',
            'copper',
            'water',
            'uran_deuterium',
        ];

        $target = $asteroidTypes[array_rand($asteroidTypes)];

        // 20% chance to find nothing
        if (random_int(1, 100) <= 20) {
            echo "Mining team explored a {$target} asteroid but found nothing.\n";
            return;
        }

        $yield = random_int(5, 20);
        $this->resources[$target] += $yield;
        echo "Mining team brought back {$yield} units of {$target}.\n";
    }

    public function getResources(): array
    {
        return $this->resources;
    }
}
