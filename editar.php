<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$info=false;

$id= filter_input(INPUT_GET,'id');

if($id){

    $info = $usuarioDao->findById($id);

}
if($info == false){
 
    header("location: index.php");
    exit;

}
?>
<head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/styles.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <title>Controle financeiro</title>
</head>

<h1>Editar</h1>
<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$info->getId();?>"/>
    <label>
        Descrição:
        <br/>
        <input type="text" name="descricao" value="<?=$info->getDescricao();?>"/>   

    </label>
    <br/>
    <br/>
    <label>
        Valor:
        <br/>
        <input type="text" name="valor" value="<?=$info->getValor();?>"/>
    </label>
    <br/>
    <br/>
    <label>
        Data:
        <br/>
        <input type="date" name="data" value="<?=$info->getData();?>"/>
    </label>
    <br/>
    <br/>
    <label>
        R/D:
        <br/>
        <input type="radio" id="receita" name="receita" value="1" <?php echo ($info->getReceita() == "1") ? "checked" : null; ?> />
        <label for="receita">Receita</label><br>
        <input type="radio" id="receita" name="receita" value="0" <?php echo ($info->getReceita() == "0") ? "checked" : null; ?> />
        <label for="despesa">Despesa</label><br>
    </label>
    <br/>
    <input type="submit" name="Adicionar" value="Editar"/> 
                  
</form>