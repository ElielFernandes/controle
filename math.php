<?php

class Math{
    public $receitaTotal;
    public $despesaTotal;
    public $saldo;

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