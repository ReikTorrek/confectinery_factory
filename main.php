<?php
/*
 * TODO: Можно добавить функционал ввода переменных данных.
 * TODO: Можно добавить функционал ввода для типа создаваемого оборудования
 *
 */

use Confectinery\Confectinery;
use Equipment\Equipment;
use Production\Production;

require_once 'app/Equipment.php';
require_once 'app/Confectinery.php';
require_once 'app/Production.php';

const TYPE_CHOCOLATE = 'chocolate';
const TYPE_ICE_CREAM = 'ice_cream';
const TYPE_CAKE = 'cake';
const WORKING_HOURS = 12;


$confectinery = new Confectinery();
// Устанавливаем срок годности и стоимость продукции в фабрике,
// потому что в ней должны находиться сертификаты и другие документы на продукцию
$confectinery->addProductionLifeTime(TYPE_CHOCOLATE, 100);
$confectinery->addProductionLifeTime(TYPE_ICE_CREAM, 200);
$confectinery->addProductionLifeTime(TYPE_CAKE, 3);

$confectinery->addProductionPrice(TYPE_CHOCOLATE, 90);
$confectinery->addProductionPrice(TYPE_ICE_CREAM, 30);
$confectinery->addProductionPrice(TYPE_CAKE, 300);

//Создаём три разных оборудования для производства
$chocolateEquipment1 = new Equipment(1, 3, TYPE_CHOCOLATE);
$iceCreamEquipment1 = new Equipment(2, 4, TYPE_ICE_CREAM);
$cakeEquipment1 = new Equipment(3, 1, TYPE_CAKE);

//Получаем нужное количество оборудования кажого типа
$confectinery->addEquipment($chocolateEquipment1);
$confectinery->addEquipment($chocolateEquipment1);
$confectinery->addEquipment($iceCreamEquipment1);
$confectinery->addEquipment($iceCreamEquipment1);
$confectinery->addEquipment($iceCreamEquipment1);
$confectinery->addEquipment($cakeEquipment1);

//Выводим информацию о кол - ве оборудования.
showEquipmentInfo($confectinery->equipmentCount);

//Производим продукцию и выводим информацию о ней.
$confectinery->produce(WORKING_HOURS);
showProductionInfo($confectinery->productionCount, $confectinery->getProductionPrice(), $confectinery->getSummaryPrice());

//Получаем больше оборудования
$confectinery->addEquipment($iceCreamEquipment1);
$confectinery->addEquipment($cakeEquipment1);

//Выводим обновлённую информацию
showEquipmentInfo($confectinery->equipmentCount);

//Снова производим продукцию и выводим информацию о ней
$confectinery->produce(WORKING_HOURS);
showProductionInfo($confectinery->productionCount, $confectinery->getProductionPrice(), $confectinery->getSummaryPrice());

function showEquipmentInfo($equipmentCount) {
    echo "\nИНФОРМАЦИЯ ПО ОБОРУДОВАНИЮ\n\n";
    echo 'Оборудования по производству шоколада(штук): ' . $equipmentCount[TYPE_CHOCOLATE] . "\n";
    echo 'Оборудования по производству мороженного(штук): ' . $equipmentCount[TYPE_ICE_CREAM] . "\n";
    echo 'Оборудования по производству Пирожных(штук): ' . $equipmentCount[TYPE_CAKE] . "\n";
}

function showProductionInfo($productionCount, $productionPrice, $summaryPrice) {
    echo "\nИНФОРМАЦИЯ О ПРОДУКЦИИ\n";
    echo "За 12 часов было произведено:\n\n";
    echo "Шоколада(штук): " . $productionCount[TYPE_CHOCOLATE] . " на сумму " . $productionPrice[TYPE_CHOCOLATE] . "\n";
    echo "Мороженного(штук): " . $productionCount[TYPE_ICE_CREAM] . " на сумму " . $productionPrice[TYPE_ICE_CREAM] . "\n";
    echo "Пирожных(штук): " . $productionCount[TYPE_CAKE] . " на сумму " . $productionPrice[TYPE_CAKE] . "\n";
    echo "ОБЩАЯ СТОИМОСТЬ ПРОДУКЦИИ: " . $summaryPrice . "\n";
}
