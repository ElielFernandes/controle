<?php
require_once '../autoload/autoload.php';

use Repository\Repository;
use Entity\Cashier;
use Config\Config;
use Classes\Math;

$repository = new Repository(new Config());

$id = htmlspecialchars(filter_input(INPUT_POST,'id'));
$description= htmlspecialchars(filter_input(INPUT_POST,'descricao'));
$value=htmlspecialchars(filter_input(INPUT_POST,'valor'));
$date=htmlspecialchars(filter_input(INPUT_POST,'data'));
$revenue=htmlspecialchars(filter_input(INPUT_POST,'receita'));

$value = Math::treatValue((int)$value);

if($id && $description && $value && $date)
{
    $editedItem = new Cashier();
    $editedItem->setId($id);
    $editedItem->setDescription($description);
    $editedItem->setValue($value);
    $editedItem->setDate($date);
    $editedItem->setRevenue($revenue); 

    $repository->update($editedItem);    

    header("location: ../index.php");
    exit;
}
else
{
    header("location: ../edit.php?id=".$id);
    exit;
}


?>