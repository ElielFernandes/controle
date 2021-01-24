<?php

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$descricao= filter_input(INPUT_POST,'descricao');
$valor=filter_input(INPUT_POST,'valor');
$data=filter_input(INPUT_POST,'data');
$receita=filter_input(INPUT_POST,'receita');

if($descricao && $valor && $data){

    $novoItem = new Usuario();
    $novoItem->setDescricao($descricao);
    $novoItem->setValor($valor);
    $novoItem->setData($data);
    $novoItem->setReceita($receita);

    $usuarioDao->add($novoItem);

    header("location: index.php");
    exit;

}else{
    header("location: index.php");
    exit;
}


?>