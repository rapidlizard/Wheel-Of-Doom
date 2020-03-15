<?php
use PHPUnit\Framework\TestCase;
use App\Selector;
use App\ListManager;

final class SelectorTest extends TestCase {

    public function testSelectorReturnsPerson() {

        $listManager = new ListManager();
        $list = $listManager->getListAllAlive();

        $selector = new Selector();
        $selected = $selector->selectPerson($list);

        $exists = in_array($selected, $list);
        $this->assertTrue($exists);

    }

}