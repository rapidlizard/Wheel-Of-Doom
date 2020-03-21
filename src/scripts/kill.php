<?php
include __DIR__ . '/../../vendor/autoload.php';

use App\Killer;
use App\ListManager;
use App\Selector;

$filename = __DIR__ . '/../../data/people.json';

echo "--Wheel of Doom KILL script--";
echo "\n";
echo "\n";
echo "Reading data from $filename";
echo "\n";
echo "\n";
echo "Killing one person from this list:";
echo "\n";

function printAll($list)
{
    for ($index = 0; $index < count($list); $index++) {
        echo "ID: " . $list[$index]['id'] . " | name: " . $list[$index]['name'] . " | status: " . $list[$index]['status'];
        echo "\n";
    }
}

$listManager = new ListManager();
$selector = new Selector();
$killer = new Killer($selector, $listManager);

$json = file_get_contents($filename);
$data = json_decode($json, true);

//$victimList = $listManager->getListAllAlive($data);

printAll($data);
echo "\n";
echo "\n";

//$victim = $selector->selectPerson($victimList);

$result = $killer->kill($data);

if(is_string($result)){
    echo "Game Over: No more people to kill";
    echo "\n";
    die();
}


echo "You killed: " . $result['name'];
echo "\n";
echo "\n";

printAll($data);
echo "\n";

$json = json_encode($data);

file_put_contents($filename, $json);

