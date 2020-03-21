<?php
include 'vendor/autoload.php';


use App\Killer;
use App\ListManager;
use App\Selector;

echo "Wheel of Doom Test script";
echo "\n";

$count = $argv[1];
$names = ['Jimmy', 'Joe'];
$fakeData = Array();

function printAll($list)
{
    for ($i = 0; $i < count($list); $i++) {
        echo "name: " . $list[$i]['name'] . " | status: " . $list[$i]['status'];
        echo "\n";
    }
}

echo "creating a list with $count alive people";
echo "\n";

for ($i = 0; $i < $count; $i++) {
    $random = rand(0, count($names) -1);
    $name = $names[$random];
    $p = Array('id' => $i + 1, 'name' => $name, 'status' => 'Alive');
    array_push($fakeData, $p);
}

printAll($fakeData);

echo "killing one person";
echo "\n";

$selector = new Selector();
$listManager = new ListManager();
$killer = new Killer($listManager, $selector);

// how to print an array to stdout

printall($fakeData);




