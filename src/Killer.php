<?php
namespace App;

final class Killer {



    public function killThePerson($victim){

        $victim['status'] = 'Dead';

        $deadPerson = $victim;

        echo $deadPerson['name'];

        return $deadPerson;
    }

}