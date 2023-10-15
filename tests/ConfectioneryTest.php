<?php
require_once 'app/Confectinery.php';
require_once 'app/Equipment.php';
require_once 'app/Production.php';
use Confectinery\Confectinery;
use Equipment\Equipment;
use PHPUnit\Framework\TestCase;

class ConfectioneryTest extends TestCase
{
    public function testAddEquipment()
    {
        $factory = new Confectinery();
        $equipment = new Equipment(1, 5, 'choco');
        $factory->addEquipment($equipment);
        $this->assertCount(1, $factory->getEquipment());
    }

    public function testProduceProducts()
    {
        $factory = new Confectinery();
        $equipment = new Equipment(1, 5, 'ice');
        $factory->addEquipment($equipment);
        $factory->produce(2);
        $this->assertEquals(['ice' => 10], $factory->productionCount);
    }
}