<?php

namespace Entity;

class Cashier 
{
    private $id;
    private $description;
    private $value;
    private $date;
    private $revenue;

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = trim($id);
    }

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription($description) 
    {
        $this->description = ucwords(trim($description));
    }

    public function getValue() 
    {
        return $this->value;
    }

    public function setValue($value) 
    {
        $this->value = trim($value);
    }

    public function getDate() 
    {
        return $this->date;
    }

    public function setDate($date) 
    {
        $this->date = trim($date);
    }

    public function getRevenue() 
    {
        return $this->revenue;
    }

    public function setRevenue($revenue) 
    {
        $this->revenue = trim($revenue);
    }
}

?>