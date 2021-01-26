<?php

require 'config.php';
require 'Math.php';
require 'dao/UsuarioDaoMysql.php';

$numero = filter_input(INPUT_GET,'num');
if(!$numero){
    $numero=0;
}
$data = new DateTime('+'.$numero.' month');
echo $data->format('Y-m');


$usuarioDao = new UsuarioDaoMysql($pdo);


$list = $usuarioDao->findByMonth($data->format('Y-m'));

$soma = new Math();
$soma->saldo($list);





?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/styles.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <title>Controle financeiro</title>
    </head>
    <body>
     
        
        
        <h2> <?php echo 'Saldo: '.$soma->saldo; ?> </h2>
        <h2> <?php echo 'Receita: '.$soma->receitaTotal; ?> </h2>
        <h2> <?php echo 'Despesas: '.$soma->despesaTotal; ?> </h2>
        
        <br/>
        

        <a href="index.php?num=<?=$numero-1;?>">[ - ]</a>
        <h3><?php echo $data->format('Y-m');?>"</h3>
        <a href="index.php?num=<?=$numero+1;?>">[ + ]</a>

        <br/>
        <br/>

        <a href="adicionar.php">[ Adicionar ]</a>

        <br/>
        <br/>
        
        <table border="1" width="100%">
            <tr>
                <th>Ações</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>R/D</th>
                <th>Valor</th>               
            </tr>
            <?php foreach($list as $dados): ?>
                <tr>
                    <th>
                        <a href="editar.php?id=<?=$dados->getId();?>">[ Editar ]</a>
                        <a href="excluir.php?id=<?=$dados->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
                    </th>
                    <th><?php echo $dados->getDescricao();?></th>
                    <th><?php echo $dados->getData();?></th>
                    <th><?php if($dados->getReceita()){
                        echo "Receita";
                    }else
                        {echo "Despesa";
                    }?></th>
                    <th><?php echo $dados->getValor();?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>

    
</html>
