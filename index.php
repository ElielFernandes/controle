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

$q = "active";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/style.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <script src="https://kit.fontawesome.com/3feed89a33.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
        <title>Controle financeiro</title>
    </head>
    <?php require 'header.php'; ?>
        <main class='container'>    
            
            <div class='flow'>
                <div class='card'> <h2>Saldo</h2> <p> <?php echo 'R$'.$soma->saldo; ?> </p> </div>
                <div class='card'> <h2>Receita</h2> <p> <?php echo 'R$'.$soma->receitaTotal; ?> </p></div>
                <div class='card'> <h2>Despesas</h2> <p> <?php echo 'R$'.$soma->despesaTotal; ?> </p></div>
            </div>  

            <div class='filterData'> 


                <div class="divAdd"><a href="#" onclick="alteraURL('adicionar.php'); Modal.open();"><i class="fas fa-plus"></i></a></div>                
                            
                <div class='Mdata'>
                    <div class="Dleft" ><a  href="index.php?num=<?=$numero-1;?>"><i class="fas fa-angle-left"></i></a></div>
                    <div class="Dcenter" ><h2  ><?php echo $data->format('Y-m');?></h2></div>
                    <div class="Dright" ><a  href="index.php?num=<?=$numero+1;?>"><i class="fas fa-angle-right"></i></a></div>
                </div> 
                <div class="ex">
                </div>         

            </div>   
            
            <div class="space-table">   
                <table id='data-table'>
                    <thead>
                        <tr class='trInf'>
                            <th class='thAction'>Ações</th>
                            <th>Descrição</th>
                            <th class='thDate'>Data</th>
                            <th class='thRevenue'>R/D</th>
                            <th class='thValue'>Valor</th>               
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $dados): ?>
                            <tr class='trDados'>
                                <td class='thAction'>
                                    <a href="excluir.php?id=<?=$dados->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fas fa-minus-circle"></i></a>
                                    <a href="#" onclick="alteraURL('editar.php?id=<?=$dados->getId();?>'); Modal.open();"><i class="fas fa-edit"></i></a>
                                    
                                </td>

                                <td><?php echo $dados->getDescricao();?></td>

                                <td class='thDate'><?php echo $dados->getData();?></td>

                                <td class='thRevenue'><?php if($dados->getReceita()){
                                    echo "Receita";
                                }else
                                    {echo "Despesa";
                                }?></td>

                                <td class='thValue'>R$ <?php echo $dados->getValor();?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>           
             
        </main>
        <div class="modal-overlay" >
            <div class='modal' >
                <div id="space">


                </div>
            </div >          
        </div >

        <script type="text/javascript" src="./assets/script/script.js"></script>                      
    <?php require 'footer.php';?>   
    
</html>
