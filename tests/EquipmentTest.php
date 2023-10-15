<?php

require_once 'app/Equipment.php';

use Equipment\Equipment;
use PHPUnit\Framework\TestCase;

class EquipmentTest extends TestCase
{
    public function testEquipmentCreation()
    {
        $equipment = new Equipment(1, 10, 'chocolate');
        $this->assertInstanceOf(Equipment::class, $equipment);
        $this->assertEquals(10, $equipment->getProductionSpeed());
        $this->assertEquals('chocolate', $equipment->getEquipmentType());

    }

    // Добавьте другие тестовые методы для Equipment здесь
}