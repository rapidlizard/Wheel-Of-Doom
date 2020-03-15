<?php
namespace App;

final class ListManager {

    private $fakeData = Array();

    public function __construct () {
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Alive');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Alive');

        array_push($this->fakeData, $p1, $p2, $p3);
    }

    public function getListAllAlive() {
        $alivePeople = Array();
        for ($index = 0; $index < count($this->fakeData); $index++) {
            if ($this->fakeData[$index]['status'] === 'Alive') {
                array_push($alivePeople, $this->fakeData[$index]);
            }
        }
        return $alivePeople;
    }


    public function updateOneToDead($id) {

        // $query = "UPDATE coder SET status = 'Dead' WHERE id=$id";
        // mysql->query($query)

        $this->fakeData[$id - 1]['status'] = 'Dead';
    }

    public function updateAllToAlive() {
        for ($index = 0; $index < count($this->fakeData); $index++) {
            $this->fakeData[$index]['status'] = 'Alive';
        }
    }


}