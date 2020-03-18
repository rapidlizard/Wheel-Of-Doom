<?php
use PHPUnit\Framework\TestCase;
use App\Killer;
use App\ListManager;
use App\Selector;

final class KillerTest extends TestCase{

    public function testIfKillerReturnsDeadPerson ()
    {
        $fakeData = array();
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Alive');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Alive');
        array_push($fakeData, $p1, $p2, $p3);
        $listManager = new ListManager();
        $selector = new Selector();
        $killer = new Killer($listManager, $selector);

        $result = $killer->kill($fakeData);

        $this->assertTrue(is_array($result));
        $this->assertEquals('Dead', $result['status']);
    }

    public function testIfKillerReturnsGameOverIfNoPeopleLeftAlive ()
    {
        $fakeData = array();
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Dead');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Dead');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Dead');
        array_push($fakeData, $p1, $p2, $p3);
        $listManager = new ListManager();
        $selector = new Selector();
        $killer = new Killer($listManager, $selector);

        $result = $killer->kill($fakeData);

        $this->assertTrue(is_string($result));
        $this->assertEquals('game over', $result);
    }

}
