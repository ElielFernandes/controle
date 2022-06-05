<?php

namespace Repository;

use PDO;
use Entity\Cashier;
use Config\Config;

class Repository implements IRepository{

    private $pdo;

    public function __construct(Config $config)
    {
        $this->pdo = new PDO("mysql:dbname=".$config->db_name.";host=".$config->db_host, $config->db_user , $config->db_pass);
    }

    public function add(Cashier $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO fluxo (descricao, valor , data ,receita) VALUES(:descricao,:valor,:data,:receita)");
        $sql->bindValue(':descricao',$u->getDescription());
        $sql->bindValue(':valor',$u->getValue());
        $sql->bindValue(':data',$u->getDate());
        $sql->bindValue(':receita',$u->getRevenue());
        $sql->execute();
        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findAll()
    {
        $array=[];
        $sql = $this->pdo->query( "SELECT * FROM fluxo" );
        if($sql->rowCount()>0)
        {
            $data =  $sql->fetchAll();
            foreach($data as $item)
            {
                $u = new Cashier();
                $u->setId($item['id']);
                $u->setDescription($item['descricao']);
                $u->setDate($item['data']);
                $u->setValue($item['valor']);
                $u->setRevenue($item['receita']);
                $array[]= $u;
            }
        }
        return $array;
    }

    public function findById($id)
    {
        $sql= $this->pdo->prepare("SELECT * FROM fluxo WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    
        if($sql->rowCount() > 0)
        {
            $data = $sql->fetch();
            $u = new Cashier();
            $u->setId($data['id']);
            $u->setDescription($data['descricao']);
            $u->setValue($data['valor']);
            $u->setDate($data['data']);
            $u->setRevenue($data['receita']);
            return $u;
        }
        else
        {
            return false;
        }
    }

    public function findByMonth($d)
    {
        $array=[];
        $sql = $this->pdo->prepare( 'SELECT * FROM fluxo WHERE data LIKE ?');
        $sql->bindValue(1,"$d%", PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount()>0)
        {
            $data =  $sql->fetchAll();
            foreach($data as $item)
            { 
                $u = new Cashier();
                $u->setId($item['id']);
                $u->setDescription($item['descricao']);
                $u->setDate($item['data']);
                $u->setValue($item['valor']);
                $u->setRevenue($item['receita']);
                $array[]= $u;
            }
        }
        return $array;
    }
    
    public function update(Cashier $u)
    {
        $sql= $this->pdo->prepare("UPDATE fluxo SET descricao = :descricao, valor = :valor , data= :data, receita = :receita WHERE id =:id");
        $sql->bindValue(':descricao',$u->getDescription());
        $sql->bindValue(':valor',$u->getValue());
        $sql->bindValue(':data',$u->getDate());
        $sql->bindValue(':receita',$u->getRevenue());
        $sql->bindValue(':id',$u->getId());
        $sql->execute();
        return true;
    }

    public function delete($id)
    {
        $sql= $this->pdo->prepare(" DELETE FROM fluxo WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        return true;
    }
}


?>