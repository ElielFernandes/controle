<?php

class Data {

    private $dataFormat;

    public function AddData( $ano, $m , $cont ){

        if($cont >0){

            for( $i = 0 ; $i < $cont ; $i++ ){        

                $m = $m + 1;

                if($m == 13){
                    $m = 1;
                    $ano = $ano + 1;
                }
                
            }
            $m = sprintf("%02d", $m);
            $this->dataFormat = $m.'-'.$ano;
            return $ano.'-'.$m;


        }else if($cont < 0){
            $var = $cont * -1;
            for( $i = 0 ; $i < $var ; $i++ ){        

                $m = $m - 1;

                if($m == 0){
                    $m = 12;
                    $ano = $ano - 1;
                }
                
            }
            $m = sprintf("%02d", $m);
            $this->dataFormat = $m.'-'.$ano;
            return $ano.'-'.$m;

        }else{
            
            $m = sprintf("%02d", $m);
            $this->dataFormat = $m.'-'.$ano;
            return $ano.'-'.$m;

        }
    
    }

    public function formatData(){

        return $this->dataFormat;
    }

    public function convert($d){

        $d = DateTime::createFromFormat("Y-m-d", $d);

        $d= $d->format('d-m-Y');

        return $d;


    }
}

?>