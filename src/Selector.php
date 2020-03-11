<?php
namespace App;


use phpDocumentor\Reflection\Types\This;

final class Selector {

    private $list = Array();

    private function buildTheList() {

        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Alive');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Alive');

        array_push($this->list, $p1, $p2, $p3);
    }

    public function selectPerson() {

        $this->buildTheList();

        return $this->list[rand(0,$this->totalPeopleInList()-1)];
    }

    private function totalPeopleInList()
    {
        $totalPeopleInlist = count($this->list);

        return $totalPeopleInlist;
    }

}