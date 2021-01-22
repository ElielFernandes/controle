<?php


class calc{
    public $receitaTotal;
    public $despesaTotal;
    public $saldo;

    public function saldo ($list) {

        foreach($list as $dados){
            if($dados['receita']==1){
               $this->receitaTotal += $dados['valor'];
            }
            else{
                $this->despesaTotal += $dados['valor'];
            }
        }
        $this->saldo = $this->receitaTotal - $this->despesaTotal;
    }
}