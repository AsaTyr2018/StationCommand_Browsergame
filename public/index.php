<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();

use StationCommand\Core\Kernel;
use StationCommand\Modules\ExampleModule\ExampleAgent;
use StationCommand\Modules\ResourceModule\ResourceAgent;

$kernel = new Kernel();
$resourceAgent = $_SESSION['resourceAgent'] ?? new ResourceAgent();
$kernel->registerAgent($resourceAgent);
$kernel->registerAgent(new ExampleAgent());

$recruitMessage = '';
if (isset($_POST['recruit'])) {
    if ($resourceAgent->recruitTeam()) {
        $recruitMessage = 'Recruited a new mining team.';
    } else {
        $recruitMessage = 'Not enough credits to recruit a mining team.';
    }
}

ob_start();
$kernel->runTick();
$tickOutput = ob_get_clean();
if ($recruitMessage !== '') {
    $tickOutput = $recruitMessage."\n".$tickOutput;
}
$resources = $resourceAgent->getResources();
$finances = $resourceAgent->getFinances();
$miningTeams = $resourceAgent->getMiningTeams();

$_SESSION['resourceAgent'] = $resourceAgent;
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
            <div>
                <?php foreach ($resources as $name => $amount): ?>
                    <span class="mr-2"><?= htmlspecialchars($name) ?>: <?= htmlspecialchars((string)$amount) ?></span>
                <?php endforeach; ?>
            </div>
            <div>Finances: <span id="finances"><?= htmlspecialchars((string)$finances) ?></span></div>
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
            <div id="station-overview">
                <p>Mining Teams: <?= htmlspecialchars((string)$miningTeams) ?></p>
                <form method="post" class="mt-2">
                    <button type="submit" name="recruit" value="1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                        Recruit Mining Team (<?= StationCommand\Modules\ResourceModule\ResourceAgent::TEAM_COST ?> cr)
                    </button>
                </form>
            </div>
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
