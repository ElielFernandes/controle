<?php

require 'config.php';

$id = filter_input(INPUT_POST,'id');
$descricao= filter_input(INPUT_POST,'descricao');
$valor=filter_input(INPUT_POST,'valor');
$data=filter_input(INPUT_POST,'data');
$receita=filter_input(INPUT_POST,'receita');

if($id && $descricao && $valor && $data){
    $sql=$pdo->prepare("UPDATE fluxo SET descricao = :descricao, valor = :valor , data= :data, receita = :receita WHERE id =:id");
    $sql->bindValue(':descricao',$descricao);
    $sql->bindValue(':valor',$valor);
    $sql->bindValue(':data',$data);
    $sql->bindValue(':receita',$receita);
    $sql->bindValue(':id',$id);
    $sql->execute();

    header("location: index.php");
    exit;

}else{
    header("location: index.php");
    exit;
}


?>