<?php

require 'config.php';
require 'Math.php';
require 'dao/UsuarioDaoMysql.php';

$numero = filter_input(INPUT_GET,'num');
if(!$numero){
    $numero=0;
}
$data = new DateTime('+'.$numero.' month');

$usuarioDao = new UsuarioDaoMysql($pdo);

$list = $usuarioDao->findByMonth($data->format('Y-m'));

$soma = new Math();
$soma->saldo($list);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styles.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <script src="https://kit.fontawesome.com/3feed89a33.js" crossorigin="anonymous"></script>
        <title>Controle financeiro</title>
    </head>
    <?php require 'header.php'; ?>
           
            </br>
            </br>
            <div class='infoGeral'>
                <div><h2> <?php echo 'Saldo: '.$soma->saldo; ?> </h2></div>
                <div><h2> <?php echo 'Receita: '.$soma->receitaTotal; ?> </h2></div>
                <div><h2> <?php echo 'Despesas: '.$soma->despesaTotal; ?> </h2></div>
            </div>
            </br>  
                
                
            <br/>
            <div class='filterData'> 


                <div><a href="adicionar.php"><i id='add' class="fas fa-plus"></i></a></div>
                
                <i class="fas fa-calendar-alt"></i>
                <i class="fas fa-cog"></i>
                <i class="fas fa-calculator"></i>

                <div class='data'>
                    <div ><a  href="index.php?num=<?=$numero-1;?>"><i class="fas fa-arrow-alt-circle-left"></i></a></div>
                    <div ><h3  ><?php echo $data->format('Y-m');?></h3></div>
                    <div ><a  href="index.php?num=<?=$numero+1;?>"><i class="fas fa-arrow-alt-circle-right"></i></a></div>
                </div>
                

                
            </div>
            </br>
            </br>   
            
            <div class='tab'>   
                <table border="1" width="100%">
                    <tr class='trInf'>
                        <th class='thAcao'>Ações</th>
                        <th>Descrição</th>
                        <th class='thData'>Data</th>
                        <th class='thRceita'>R/D</th>
                        <th class='thValor'>Valor</th>               
                    </tr>
                        <?php foreach($list as $dados): ?>
                            <tr class='trDados'>
                                <th class='thAcao'>
                                    <a href="editar.php?id=<?=$dados->getId();?>"><i class="fas fa-edit"></i></a>
                                    <a href="excluir.php?id=<?=$dados->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fas fa-trash-alt"></i></a>
                                </th>
                                <th><?php echo $dados->getDescricao();?></th>
                                <th class='thData'><?php echo $dados->getData();?></th>
                                <th class='thRceita'><?php if($dados->getReceita()){
                                    echo "Receita";
                                }else
                                    {echo "Despesa";
                                }?></th>
                                <th class='thValor'><?php echo $dados->getValor();?></th>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
            </br>  
            </br>
            </br>                         
    <?php require 'footer.php';?>
    
    
</html>

