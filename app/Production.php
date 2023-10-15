<?php

namespace Production;

class Production
{
    protected $lifeTime; //Срок годности
    protected $price; //Цена
    protected $productionTime; //Время производства
    protected $productionType; // Тип продукции

    public function __construct($lifeTime, $price, $productionType, $productionTime)
    {
        $this->lifeTime = $lifeTime;
        $this->price = $price;
        $this->productionType = $productionType;
        $this->productionTime = $productionTime;
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getProductionType()
    {
        return $this->productionType;
    }
}