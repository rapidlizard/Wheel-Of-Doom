<?php
namespace App;

final class Selector {

    public function selectPerson($list){

        $totalPeopleInList = count($list)-1;

        $index = rand(0,$totalPeopleInList);

        return $list[$index];

    }

}
