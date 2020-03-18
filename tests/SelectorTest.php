<?php
use PHPUnit\Framework\TestCase;
use App\Selector;
use App\ListManager;

final class SelectorTest extends TestCase {

    public function testSelectorReturnsPerson() {

        $fakeData = array();
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Alive');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Alive');
        array_push($fakeData, $p1, $p2, $p3);

        $selector = new Selector();
        $selected = $selector->selectPerson($fakeData);

        $exists = in_array($selected, $fakeData);
        $this->assertTrue($exists);

    }

}