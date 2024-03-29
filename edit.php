<?php
require_once 'autoload/autoload.php';

use Config\Config;
use Repository\Repository;


$repository = new Repository(new Config());
$item = false;
$id= filter_input(INPUT_GET,'id');

if($id)
{
    $item = $repository->findById($id);
}

if($item == false)
{
    header("location: index.php");
    exit;
}

?>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="assets/css/style.css" />
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
    <title>Controle financeiro</title>
</head>
<form class="form" method="POST" action="UseCases/Edit.php">
    <h2>Editar</h2>
    
    <input type="hidden" name="id" value="<?=$item->getId();?>"/>
    <div class="input-group">
        <label>Descrição:</label>
        <input type="text" name="descricao" value="<?=$item->getDescription();?>"/>   
    </div>
    <div class="input-group" >  
        <label>Valor:</label>
        <input type="number" name="valor" placeholder="0,00"  step="0.01" value="<?=$item->getValue();?>"/>
    </div>
    <div class="input-group" >   
        <label>Data:</label>
        <input type="date" name="data" value="<?=$item->getDate();?>"/>
    </div>
    <div class="input-group radio" >   
        <label>R/D:</label>
        <div class="radioInput">
            <div class="radioInput set">
                <input type="radio" name="receita" value="1" <?php echo ($item->getRevenue() == "1") ? "checked" : null; ?> />
                <label for="receita">Receita</label>
            </div>
            <div class="radioInput set">
                <input type="radio" name="receita" value="0" <?php echo ($item->getRevenue() == "0") ? "checked" : null; ?> />
                <label for="despesa">Despesa</label>
            </div>
        </div>
    </div>
        
    <div class="input-group actions">
        <a class="button cancel" onclick="Modal.close()" href="#">Cancelar</a>    
        <button>Editar</button>
    </div>
</form>
