<?php

require_once 'autoload/autoload.php';

use Repository\Repository;
use Classes\Math;
use Classes\Date;
use Config\Config;

$month = htmlspecialchars(filter_input(INPUT_GET,'mes'));
$year = htmlspecialchars(filter_input(INPUT_GET,'ano'));

$date = new Date($month, $year);

$repository = new Repository(new Config());
$list = $repository->findByMonth($date->getDateQuery());

$math = new Math();
$math->balance($list);

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

    <body>
    <?php require 'header.php'; ?>
        <main class='container'>
            
            <div class='flow'>
                <div class='balance <?=$math->balance < 0 ? "active": "" ?>'> <h2>Saldo</h2> <p id='cardSaldo'> R$ <?php echo $math->balance; ?> </p> </div>
                <div class='card'> <h2>Receita</h2> <p> <?php echo 'R$ '.$math->totalRevenue; ?> </p></div>
                <div class='card'> <h2>Despesas</h2> <p> <?php echo 'R$ '.$math->totalExpense; ?> </p></div>
            </div>

            <div class='filterData'> 
                <div class="divAdd"><a href="#" onclick="changeURL('add.php'); Modal.open();"><i class="fas fa-plus"></i></a></div>                       
                <div class='controlData'>
                    <div class="controlLeft" ><a  href="index.php?<?=$date->lastMonthQueryString() ?>" ><i class="fas fa-angle-left"></i></a></div>
                    <div class="controlCenter" ><h2  ><?php echo $date->formatData();?></h2></div>
                    <div class="controlRight" ><a  href="index.php?<?=$date->nextMonthQueryString() ?>" ><i class="fas fa-angle-right"></i></a></div>
                    
                </div>  
            </div>   
            
            <div class="space-table">   
                <table id='data-table'>
                    <thead>
                        <tr class='trInf'>
                            <th class='tdAction'>Ações</th>
                            <th>Descrição</th>
                            <th class='tdDate'>Data</th>
                            <th class='tdRevenue'>R/D</th>
                            <th class='tdValue'>Valor</th>               
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $dados): ?>
                            <tr class='trDados <?=$dados->getRevenue() == 0 ? "expense": "revenue" ?>'>

                                <td class='tdAction'>

                                    <a href="UseCases/Delete.php?id=<?=$dados->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fas fa-minus-circle"></i></a>
                                    <a href="#" onclick="changeURL('edit.php?id=<?=$dados->getId();?>'); Modal.open();"><i class="fas fa-edit"></i></a>
                                    
                                </td>

                                <td><?php echo $dados->getDescription();?></td>

                                <td class='tdDate'><?php echo $date->convert($dados->getDate());?></td>

                                <td class='tdRevenue'><?php if($dados->getRevenue()){
                                    echo "Receita";
                                }
                                else{
                                    echo "Despesa";
                                }
                                ?></td>

                                <td class='tdValue'>R$ <?php echo $dados->getValue();?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>           
             
        </main>
        <div class="modal-overlay" >
            <div id="space">
            </div>       
        </div >        

        <script type="text/javascript" src="./assets/script/script.js"></script>  

    <?php require 'footer.php';?> 
    </body>  
</html>
