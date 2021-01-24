<?php

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST,'id');
$descricao= filter_input(INPUT_POST,'descricao');
$valor=filter_input(INPUT_POST,'valor');
$data=filter_input(INPUT_POST,'data');
$receita=filter_input(INPUT_POST,'receita');

if($id && $descricao && $valor && $data){

    $itemEditado = new Usuario();
    $itemEditado->setId($id);
    $itemEditado->setDescricao($descricao);
    $itemEditado->setValor($valor);
    $itemEditado->setData($data);
    $itemEditado->setReceita($receita);

    $usuarioDao->update($itemEditado);    

    header("location: index.php");
    exit;

}else{

    header("location: editar.php?id=".$id);
    exit;
}


?>