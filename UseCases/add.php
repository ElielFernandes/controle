<?php
require_once '../autoload/autoload.php';

use Repository\Repository;
use Entity\Cashier;
use Config\Config;
use Classes\Math;

$repository = new Repository(new Config());

$description = htmlspecialchars(filter_input(INPUT_POST,'descricao'));
$value = htmlspecialchars(filter_input(INPUT_POST,'valor'));
$date = htmlspecialchars(filter_input(INPUT_POST,'data'));
$revenue = htmlspecialchars(filter_input(INPUT_POST,'receita'));

$value = Math::treatValue($value);

if($description && $value && $date)
{
    $newItem = new Cashier();
    $newItem->setDescription($description);
    $newItem->setValue($value);
    $newItem->setDate($date);
    $newItem->setRevenue($revenue);

    $repository->add($newItem);
}

header("location: ../index.php");
exit;

?>
