<?php

namespace Equipment;

class Equipment
{
    protected $id; //Идентификатор оборудования
    protected $productionSpeed; //Скорость производства
    protected $equipmentType; // Тип оборудования

    public function __construct($id, $productionSpeed, $equipmentType)
    {
        $this->id = $id;
        $this->productionSpeed = $productionSpeed;
        $this->equipmentType = $equipmentType;
    }

    /**
     * @return string
     */
    public function getEquipmentType()
    {
        return $this->equipmentType;
    }

    /**
     * @return integer
     */
    public function getProductionSpeed()
    {
        return $this->productionSpeed;
    }
}