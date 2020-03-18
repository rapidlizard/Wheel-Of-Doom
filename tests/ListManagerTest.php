<?php
use PHPUnit\Framework\TestCase;
use App\ListManager;

final class ListManagerTest extends TestCase
{
    public function testListAllAliveReturnsAll ()
    {
        $fakeData = Array();
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Alive');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Alive');
        array_push($fakeData, $p1, $p2, $p3);
        $listManager = new ListManager();

        $list = $listManager->getListAllAlive($fakeData);

        $this->assertEquals(3, count($list));
    }

    public function testListAllReturnsEmptyIfAllDead ()
    {
        $fakeData = Array();
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Dead');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Dead');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Dead');
        array_push($fakeData, $p1, $p2, $p3);
        $listManager = new ListManager();

        $list = $listManager->getListAllAlive($fakeData);

        $this->assertEquals(0, count($list));
    }


    public function testUpdateOneToDead ()
    {

        $fakeVictim = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Alive');
        $listManager = new ListManager();

        $deadPerson = $listManager->updateOneToDead($fakeVictim);

        $this->assertEquals('Dead', $deadPerson['status']);

    }

    public function testUpdateAllToAlive ()
    {
        $fakeData = Array();
        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Dead');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Dead');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Dead');
        array_push($fakeData, $p1, $p2, $p3);
        $listManager = new ListManager();

        $reset = $listManager->updateAllToAlive($fakeData);

        for ($index = 0; $index < count($fakeData); $index++) {
            $this->assertEquals('Alive', $reset[$index]['status']);
        }

//        $this->assertTrue((in_array(0, in_array( 'status'))));
    }


}