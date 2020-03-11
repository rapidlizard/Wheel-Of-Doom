<?php
use PHPUnit\Framework\TestCase;
use App\Selector;

final class SelectorTest extends TestCase
{

    public function testIfSelectsPersonAlive () {

        $selector = new Selector();

        $selected = $selector->selectPerson();

        $this->assertEquals("Alive", $selected['status']);
    }

}