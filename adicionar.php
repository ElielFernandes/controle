<?php

require 'config.php';

$descricao= filter_input(INPUT_POST,'descricao');
$valor=filter_input(INPUT_POST,'valor');
$data=filter_input(INPUT_POST,'data');
$receita=filter_input(INPUT_POST,'receita');

if($descricao && $valor && $data){

    $sql = $pdo->prepare("INSERT INTO fluxo (descricao, valor , data ,receita) VALUES(:descricao,:valor,:data,:receita)");
    $sql->bindValue(':descricao',$descricao);
    $sql->bindValue(':valor',$valor);
    $sql->bindValue(':data',$data);
    $sql->bindValue(':receita',$receita);
    $sql->execute();

    header("location: index.php");
    exit;

}else{
    header("location: index.php");
    exit;
}


?>