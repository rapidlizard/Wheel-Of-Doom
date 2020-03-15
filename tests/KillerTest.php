<?php
use PHPUnit\Framework\TestCase;
use App\Killer;
use App\ListManager;
use App\Selector;

final class KillerTest extends TestCase{

    public function testIfKillerKilledOne(){

        $listManager = new ListManager();

        $selector = new Selector($listManager);

        $killer = new Killer($listManager, $selector);

        $listManager->updateOneToDead(1);

        $result = $killer->kill();

        $this->assertEquals('Dead', $result['status']);

    }

}
