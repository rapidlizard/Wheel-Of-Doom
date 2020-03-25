<?php
namespace App;

use App\Conexion;
use App\ListManager;

use App\Killer;
use App\Selector;
use App\Reseter;

$filename = __DIR__ . '/../../data/people.json';

$json = file_get_contents($filename);
$list = json_decode($json, true);

$listManager = new ListManager();
$selector = new Selector();
$killer = new Killer($selector, $listManager);

$result = $killer->kill($list);

$listAlive = $listManager->getListAllAlive($list);
$listDead = $listManager->getListAllDead($list);


function printList($list)

{
    for ($index = 0; $index < count($list); $index++) {
        if($list[$index]['status'] = 'Dead'){?>
            <div class="person">
                <img class="dead" src='<?php $list[$index]['image']?>'><h3><?php $list[$index]['name']?></h3>
            </div>
            <?php 
            ?>
            }
            <div class="person"><img src='<?php $list[$index]['image']?>'><h3><?php $list[$index]['name']?></h3>
        </div>
        <?php 
    
    }
}



?>

<!DOCTYPE html>
<html>
    <head>
    <title>Wheel of doom</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" ">
    <link rel="stylesheet" href="wheel-of-doom.css">
    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    </head>


<body>
    <header>
        <h1 style="font-family: 'McLaren', cursive;">Wheel of Doom</h1>
        <h4 id="tagline">THE MOST DANGEROUS PLAY</h4>
    </header>
    <main>
        <div id="main_container_flex">
            <?php printList($list)?>
        </div>
    </main>
    <footer>
        <div id="footer_container">
            <div class="counter">
                <h2 style="font-family: 'McLaren', cursive;"><? echo count($listAlive);?></h2>
                <p><strong>CODERS TO KILL</strong></p>
            </div>

            <div>
                <p>Click the button to randomly kill a coder</p>
                <button class="button"><a href= "<?php $result = $killer->kill($list)?>">KILL!</a></button>
                <h2 class="text-description">The coder killed is <?php echo $result?></h2>
            </div>

            <div class="counter">
                <h2 style="font-family: 'McLaren', cursive;"><? echo count($listAlive);?></h2>
                <p><strong>CODERS KILLED</strong></p>
            </div>

        </div>
    </footer>
</body>
</html>

