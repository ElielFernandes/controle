<?php

require 'config.php';
require 'math.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$list = $usuarioDao->findAll();


$saldo;
$soma = new calc();
$soma->saldo($list);



?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <title>Controle financeiro</title>
    </head>
    <body>
        <h2> <?php echo 'Saldo: '.$soma->saldo; ?> </h2>
        <h2> <?php echo 'Receita: '.$soma->receitaTotal; ?> </h2>
        <h2> <?php echo 'Despesas: '.$soma->despesaTotal; ?> </h2>
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
