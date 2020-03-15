<?php
namespace App;

final class Killer {

    public function __construct($listManager, $selector) {
        $this->listManager = $listManager;
        $this->selector = $selector;
    }

    public function kill() {

        $list = $this->listManager->getListAllAlive();

        if (count($list) === 0) {
            echo 'game over';
            return 'game over';
        }

        $victim = $list[0];

        $victim['status'] = 'Dead';

        return $victim;

    }

}