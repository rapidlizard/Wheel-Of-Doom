<?php
include 'vendor/autoload.php';

use App\Killer;
use App\ListManager;
use App\Selector;

echo "--Wheel of Doom RESET script--";
echo "\n";
echo "\n";


function printAll($list)
{
    for ($i = 0; $i < count($list); $i++) {
        echo "id: " . $list[$i]['id'] . " | name: " . $list[$i]['name'] . " | status: " . $list[$i]['status'];
        echo "\n";
    }
}

$fileContents = file_get_contents('./data/people.json');
$data = json_decode($fileContents, true);

echo "Your going to reset everyone in this list to alive:";
echo "\n";

printAll($data);

echo "\n";
echo "\n";


for ($i = 0; $i < count($data); $i++) {

    $data[$i]['status'] = 'Alive';

}

$json = json_encode($data);

file_put_contents('./data/people.json', $json);

echo "The list now:";
echo "\n";

printAll($data);


