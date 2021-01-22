<?php

require 'config.php';
require 'math.php';
$list = [];
$sql=$pdo->query("SELECT * FROM fluxo");
if($sql->rowCount()>0)
{
    $list = $sql->fetchAll(PDO::FETCH_ASSOC);
}

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
                        <a href="editar.php?id=<?=$dados['id'];?>">[ Editar ]</a>
                        <a href="excluir.php?id=<?=$dados['id'];?>">[ Excluir ]</a>
                    </th>
                    <th><?php echo $dados['descricao'];?></th>
                    <th><?php echo $dados['data'];?></th>
                    <th><?php if($dados['receita']){
                        echo "Receita";
                    }else
                        {echo "Despesa";
                    }?></th>
                    <th><?php echo $dados['valor'];?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>

    
</html>
