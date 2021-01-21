<?php

require 'config.php';
$list = [];
$sql=$pdo->query("SELECT * FROM fluxo");
if($sql->rowCount()>0)
{
    $list = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <title>Controle financeiro</title>
    </head>
    <body>
        <form method="POST" action="adicionar.php">

            <label>
                Descrição:
                <br/>
                <input type="text" name="descricao"/>   

            </label>
            <br/>
            <br/>
            <label>
                Valor:
                <br/>
                <input type="text" name="valor"/>
            </label>
            <br/>
            <br/>
            <label>
                Data:
                <br/>
                <input type="date" name="data"/>
            </label>
            <br/>
            <br/>
            <label>
                R/D:
                <br/>
                <input type="radio" id="receita" name="receita" value="1" checked>
                <label for="receita">Receita</label><br>
                <input type="radio" id="receita" name="receita" value="0">
                <label for="despesa">Despesa</label><br>
            </label>
            <br/>
            <input type="submit" name="Adicionar" value="Adicionar"/>          

        </form>

    
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
                        <a href="">[ Editar ]</a>
                        <a href="">[ Excluir ]</a>
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
