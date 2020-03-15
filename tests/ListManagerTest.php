<?php
use PHPUnit\Framework\TestCase;
use App\ListManager;

final class ListManagerTest extends TestCase
{

    public function testListAllAliveReturnsAll () {

        $listManager = new ListManager();

        $list = $listManager->getListAllAlive();

        $this->assertEquals(3, count($list));
    }

    public function testUpdateOneToDead () {

        $listManager = new ListManager();

        $listManager->updateOneToDead(1);

        $list = $listManager->getListAllAlive();

        $this->assertEquals(2, count($list));
    }

    public function testListAllReturnsEmptyIfAllDead () {

        $listManager = new ListManager();

        $listManager->updateOneToDead(1);
        $listManager->updateOneToDead(2);
        $listManager->updateOneToDead(3);

        $list = $listManager->getListAllAlive();

        $this->assertEquals(0, count($list));
    }

    public function testUpdateAllToAlive () {

        $listManager = new ListManager();

        $listManager->updateOneToDead(1);
        $listManager->updateOneToDead(2);
        $listManager->updateOneToDead(3);

        $listManager->updateAllToAlive();

        $list = $listManager->getListAllAlive();

        $this->assertEquals(3, count($list));
    }

}