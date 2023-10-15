<?php

namespace Confectinery;

use Equipment\Equipment;
use Production\Production;

class Confectinery
{
    public $equipmentCount = [];
    public $productionCount = [];
    protected $equipment = [];
    protected $production = [];
    protected $productionLifeTime = [];
    protected $productionPrice = [];

    public function addEquipment(Equipment $equipment)
    {
        $this->iterateEquipment($equipment);
        $this->equipment[] = $equipment;
    }

    public function produce($hours)
    {
        $this->clearProduction();
        foreach ($this->equipment as $equipment) {
            for ($i = 0; $i < $equipment->getProductionSpeed() * $hours; $i ++) {
                $this->production[] = new Production($this->getProductionLifeTimeByEquipment($equipment->getEquipmentType()),
                    $this->getProductionPriceByEquipment($equipment->getEquipmentType()), $equipment->getEquipmentType(), time());
                $this->iterateProductionCount($equipment);
            }
        }
    }

    public function getProductionPriceByEquipment($equipmentType)
    {
        return $this->productionPrice[$equipmentType];
    }

    public function getProductionLifeTimeByEquipment($equipmentType)
    {
        return $this->productionLifeTime[$equipmentType];
    }

    public function getProductionPrice()
    {
        $productionPrice = [];
        foreach ($this->production as $production) {
            if (isset($productionPrice[$production->getProductionType()])) {
                $productionPrice[$production->getProductionType()] += $production->getPrice();
            } else {
                $productionPrice[$production->getProductionType()] = $production->getPrice();
            }
        }
        return $productionPrice;
    }

    public function getSummaryPrice()
    {
        $summaryPrice = 0;
        foreach ($this->production as $production) {
            $summaryPrice += $production->getPrice();
        }
        return $summaryPrice;
    }

    public function addProductionPrice($productionType, $price)
    {
        $this->productionPrice[$productionType] = $price;
    }

    public function addProductionLifeTime($productionType, $lifeTime)
    {
        $this->productionLifeTime[$productionType] = $lifeTime;
    }

    private function clearProduction()
    {
        $this->production = [];
        $this->productionCount = [];
    }

    private function iterateProductionCount(Equipment $equipment)
    {
        isset($this->productionCount[$equipment->getEquipmentType()])
            ? $this->productionCount[$equipment->getEquipmentType()] ++
            : $this->productionCount[$equipment->getEquipmentType()] = 1;
    }

    private function iterateEquipment(Equipment $equipment)
    {
        isset($this->equipmentCount[$equipment->getEquipmentType()])
            ? $this->equipmentCount[$equipment->getEquipmentType()] ++
            : $this->equipmentCount[$equipment->getEquipmentType()] = 1;
    }
}