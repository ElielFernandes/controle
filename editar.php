<?php
require 'config.php';

$info=[];

$id= filter_input(INPUT_GET,'id');

if($id){

    $sql= $pdo->prepare("SELECT * FROM fluxo WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){

        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }
    else{
        header("location: index.php");
        exit;
    }
}else{
 
    header("location: index.php");
    exit;

}

?>
<h1>Editar</h1>
<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$info['id'];?>"/>
    <label>
        Descrição:
        <br/>
        <input type="text" name="descricao" value="<?=$info['descricao'];?>"/>   

    </label>
    <br/>
    <br/>
    <label>
        Valor:
        <br/>
        <input type="text" name="valor" value="<?=$info['valor'];?>"/>
    </label>
    <br/>
    <br/>
    <label>
        Data:
        <br/>
        <input type="date" name="data" value="<?=$info['data'];?>"/>
    </label>
    <br/>
    <br/>
    <label>
        R/D:
        <br/>
        <input type="radio" id="receita" name="receita" value="1" <?php echo ($info['receita'] == "1") ? "checked" : null; ?> />
        <label for="receita">Receita</label><br>
        <input type="radio" id="receita" name="receita" value="0" <?php echo ($info['receita'] == "0") ? "checked" : null; ?> />
        <label for="despesa">Despesa</label><br>
    </label>
    <br/>
    <input type="submit" name="Adicionar" value="Adicionar"/> 
                  
</form>