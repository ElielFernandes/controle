
<head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/style.css" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <title>Controle financeiro</title>
</head>


<form class="form" method="POST" action="adicionar_action.php">
        
            <h2>Adicionar</h2>
            
            <div class="input-group">
                <label>Descrição:</label>
                <input type="text" name="descricao"/>   
            </div>
            <div class="input-group" >  
                <label>Valor:</label>
                <input type="number" name="valor" placeholder="0,00"  step="0.01"/>
            </div>
            <div class="input-group" >   
                <label>Data:</label>
                <input type="date" name="data"/>
            </div>
            <div class="input-group radio" >   
                <label>R/D:</label>
                <div class="radioInput">
                    <div class="radioInput set">
                        <input type="radio" id="receita" name="receita" value="1" checked>
                        <label for="receita">Receita</label>
                    </div>
                    <div class="radioInput set">
                        <input type="radio" id="receita" name="receita" value="0">
                        <label for="despesa">Despesa</label>
                    </div>
                </div>
            </div>
                
            <div class="input-group actions">
                <a class="button cancel" onclick="Modal.close()"  href="#">Cancelar</a>    
                <button>Adicionar</button>
            </div> 
              

</form>

<script type="text/javascript" src="./assets/script/script.js"></script>
