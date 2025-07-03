<?php
require __DIR__ . '/../vendor/autoload.php';

use StationCommand\Core\Kernel;
use StationCommand\Modules\ExampleModule\ExampleAgent;

$kernel = new Kernel();
$kernel->registerAgent(new ExampleAgent());

ob_start();
$kernel->runTick();
$tickOutput = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Station Command</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
<div id="overlay" class="min-h-screen flex flex-col">
    <header class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between">
            <div>Resources: <span id="resources">0</span></div>
            <div>Finances: <span id="finances">0</span></div>
        </div>
    </header>
    <div class="flex flex-1">
        <aside class="w-1/5 bg-gray-800 p-4">
            <h2 class="text-lg font-bold mb-4">Station Modules</h2>
            <ul>
                <li class="mb-2">Module 1</li>
                <li class="mb-2">Module 2</li>
                <li class="mb-2">Module 3</li>
            </ul>
        </aside>
        <main class="flex-1 bg-gray-700 p-4">
            <h2 class="text-lg font-bold mb-4">Station Overview</h2>
            <div id="station-overview">Overview content here.</div>
        </main>
        <aside class="w-1/5 bg-gray-800 p-4">
            <h2 class="text-lg font-bold mb-4">Defense & Security</h2>
            <ul>
                <li class="mb-2">Turrets</li>
                <li class="mb-2">Shields</li>
                <li class="mb-2">Security Teams</li>
            </ul>
        </aside>
    </div>
</div>
<pre class="p-4 text-sm"><?php echo htmlspecialchars($tickOutput, ENT_QUOTES, 'UTF-8'); ?></pre>
</body>
</html>
