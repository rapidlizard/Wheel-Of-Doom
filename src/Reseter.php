<?php
namespace App;

final class Reseter
{

    public function peopleAliveAgain($deadList)
    {

        for ($index = 0; $index < count($deadList); $index++) {
            $deadList[$index]['status'] = 'Alive';
        }

        $alivePeople = $deadList;


        return $alivePeople;
    }
}