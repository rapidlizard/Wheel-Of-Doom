<?php
namespace App;

final class Killer
{

    public function __construct($listManager, $selector)
    {
        $this->listManager = $listManager;
        $this->selector = $selector;
    }

    public function kill(&$list)
    {
        $listManager = new ListManager();
        $selector = new Selector();

        $victimList = $listManager->getListAllAlive($list);
        if (count($victimList) === 0) {
            return 'game over';
        }

        $victim = $selector->selectPerson($victimList);
        $victimIndex = array_search($victim, $list);
        $list[$victimIndex]['status'] = 'Dead';
        $victim['status'] = 'Dead';

        return $victim;
    }
}