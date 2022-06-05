<?php

namespace Classes;

use DateTime;

class Date{

    private $month;
    private $year;
    private $dataFormat;

    public function __construct($month, $year)
    {
        if(isset($month) && isset($year) && checkdate((int)$month, 1,(int)$year))
        {
            $this->month = $month;
            $this->year = $year;
        }
        else
        {
            $date = mktime(0,0,0,date("n"),date("j"),date("Y"));
            $this->month = date("m", $date);
            $this->year = date("Y", $date);
        }
    }

    public function formatData(){

        return $this->month."-".$this->year;
    }

    public function convert($d){

        $d = DateTime::createFromFormat("Y-m-d", $d);
        $d= $d->format('d-m-Y');
        return $d;
    }

    public function getDateQuery()
    {
        return $this->year."-".$this->month;
    }

    public function getDataQueryString()
    {
        return http_build_query(["mes" => $this->month, "ano"=>$this->year]);
    }

    public function nextMonthQueryString()
    {
        $date = mktime(0,0,0, $this->month + 1 ,date("j"), $this->year);
        $month = date("m", $date);
        $year = date("Y", $date);
        return http_build_query(["mes" => $month, "ano" => $year]);
    }

    public function lastMonthQueryString()
    {
        $date = mktime(0,0,0, $this->month - 1,date("j"), $this->year);
        $month = date("m", $date);
        $year = date("Y", $date);
        return http_build_query(["mes" => $month, "ano" => $year]);
    }


}

?>