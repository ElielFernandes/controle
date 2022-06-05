<?php
require_once '../autoload/autoload.php';

use Repository\Repository;
use Config\Config;

$repository = new Repository(new Config());

$id= filter_input(INPUT_GET,'id');

if(isset($id) && is_numeric($id))
{
  $repository->delete($id);
}

header("location: ../index.php");
exit;

?>