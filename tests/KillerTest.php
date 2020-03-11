<?php
use PHPUnit\Framework\TestCase;
use App\Killer;

final class KillerTest extends TestCase {

    public function testToSeeIfDeadPersonIsDead () {

        $killer = new Killer();

        $victim = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');

        $deadPerson = $killer->killThePerson($victim);

        $this->assertEquals('Dead', $deadPerson['status']);
    }

}

