
<h1>Adicionar</h1>
<form method="POST" action="adicionar_action.php">

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