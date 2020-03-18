<?php
namespace App;

final class Killer {

    public function __construct($listManager, $selector) {
        $this->listManager = $listManager;
        $this->selector = $selector;
    }

    public function kill($list) {

        $victimList = $this->listManager->getListAllAlive($list);

        if (count($victimList) === 0) {
            return 'game over';
        }

        $victim = $this->selector->selectPerson($victimList);

        $victim['status'] = 'Dead';

        return $victim;
    }

}