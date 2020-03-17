<?php
use PHPUnit\Framework\TestCase;
use App\Reseter;

final class ReseterTest extends TestCase
{

    private $deadList = array();

    public function setUp(): void {

        $p1 = Array('id' => 1, 'name' => 'Jimmy', 'status' => 'Dead');
        $p2 = Array('id' => 2, 'name' => 'Bob', 'status' => 'Dead');
        $p3 = Array('id' => 3, 'name' => 'Jim', 'status' => 'Dead');

        array_push($this->deadList, $p1, $p2, $p3);
    }

    public function testIfPeopleAreAliveAgain()
    {
        $reseter = new Reseter();

        $aliveList = $reseter->peopleAliveAgain($this->deadList);

        $this->assertEquals('Alive', $aliveList[0]['status']);
        $this->assertEquals('Alive', $aliveList[1]['status']);
        $this->assertEquals('Alive', $aliveList[2]['status']);
    }

}