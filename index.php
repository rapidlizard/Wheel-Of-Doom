<?php

namespace App;
include ('vendor/autoload.php');

use App\ListManager;
use App\Killer;
use App\Selector;
// use App\Reseter;

$filename = __DIR__ . '/data/people.json';
$json = file_get_contents($filename);
$list = json_decode($json, true);

$listManager = new ListManager();
$selector = new Selector();
$killer = new Killer($selector, $listManager);

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $killer->kill($list);
}

$aliveList = $listManager->getListAllAlive($list);
$listDead = $listManager->getListAllDead($list);

$json = json_encode($list);
file_put_contents($filename, $json);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wheel of doom</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=" ">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    </head>


    <body>
    <header>
        <h1 style="font-family: 'McLaren', cursive;">Wheel of Doom</h1>
        <h4 id="tagline">THE MOST DANGEROUS GAME</h4>
    </header>
    <main>
        <div class="main_container_flex">

            <?php for ($index = 0; $index < count($list); $index++): ?>
                    <div class="person<?php echo $list[$index]['status']; ?>">
                        <img class="<?php echo $list[$index]['status']; ?>" src="<?php echo $list[$index]['image']?>">
                        <p><?php echo $list[$index]['name']?></p>
                    </div>
            <?php endfor;?>

        </div>
    </main>
    <footer>
        <div id="footer_container">
            <div class="counter">
                <h2 style="font-family: 'McLaren', cursive;">
                    <?php

                    echo count($aliveList);


                    ?></h2>
                <p><strong>CODERS TO KILL</strong></p>
            </div>

            <div>
                <p>Click the button to randomly kill a coder</p>
                <form method="POST">
                    <button class="button" type="submit">KILL!</button>
                </form>
                <?php if (is_array($result)): ?>
                    <h2 class="text-description">The coder killed is <span><?php echo $result['name']; ?></span></h2>
                <?php endif; ?>
                <?php if (count($aliveList) === 0): ?>
                    <h2 class="text-description">Game over</span></h2>
                <?php endif; ?>
            </div>

            <div class="counter">
                <h2 style="font-family: 'McLaren', cursive;">
                    <?php
                    echo count($listDead);
                    ?>
                </h2>

                <p><strong>CODERS KILLED</strong></p>
            </div>

        </div>
    </footer>
    </body>
</html>
