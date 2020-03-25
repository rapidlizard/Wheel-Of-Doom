<?php
namespace App;

final class ListManager {

    public function getListAllAlive($list) {
        $alivePeople = Array();
        for ($index = 0; $index < count($list); $index++) {
            if ($list[$index]['status'] === 'Alive') {
                array_push($alivePeople, $list[$index]);
            }
        }
        return $alivePeople;
    }

    public function getListAllDead($list) {
        $deadPeople = Array();
        for ($index = 0; $index < count($list); $index++) {
            if ($list[$index]['status'] === 'Dead') {
                array_push($deadPeople, $list[$index]);
            }
        }
        return $deadPeople;
    }


    public function updateOneToDead($victim) {

        $victim['status'] = 'Dead';

        return $victim;
    }

    public function updateAllToAlive($list) {
        for ($index = 0; $index < count($list); $index++) {
            $list[$index]['status'] = 'Alive';
        }
        return $list;
    }


}