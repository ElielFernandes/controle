<?php

class Math{
    public $receitaTotal = 0;
    public $despesaTotal = 0;
    public $saldo = 0;

    public function saldo ($l) {

        foreach($l as $dado){
            if($dado->getReceita()==1){
               $this->receitaTotal += $dado->getValor();
            }
            else{
                $this->despesaTotal += $dado->getValor();
            }
        }
        $this->saldo = $this->receitaTotal - $this->despesaTotal;
    }
}