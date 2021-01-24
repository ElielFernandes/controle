<?php
require_once 'classes/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function add(Usuario $u){

        $sql = $this->pdo->prepare("INSERT INTO fluxo (descricao, valor , data ,receita) VALUES(:descricao,:valor,:data,:receita)");
        $sql->bindValue(':descricao',$u->getDescricao());
        $sql->bindValue(':valor',$u->getValor());
        $sql->bindValue(':data',$u->getData());
        $sql->bindValue(':receita',$u->getReceita());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;

    }
    public function findAll(){
        $array=[];

        $sql = $this->pdo->query( "SELECT * FROM fluxo" );
        if($sql->rowCount()>0){
           $data =  $sql->fetchAll();

           foreach($data as $item){
            $u = new Usuario();
            $u->setId($item['id']);
            $u->setDescricao($item['descricao']);
            $u->setData($item['data']);
            $u->setValor($item['valor']);
            $u->setReceita($item['receita']);

            $array[]= $u;

           }

        }

        return $array;

    }
    public function findById($id){

        $sql= $this->pdo->prepare("SELECT * FROM fluxo WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    
        if($sql->rowCount() > 0){
    
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setDescricao($data['descricao']);
            $u->setValor($data['valor']);
            $u->setData($data['data']);
            $u->setReceita($data['receita']);
            return $u;
        }
        else{
            
            return false;
        }

    }
    public function update(Usuario $u){

        $sql= $this->pdo->prepare("UPDATE fluxo SET descricao = :descricao, valor = :valor , data= :data, receita = :receita WHERE id =:id");
        $sql->bindValue(':descricao',$u->getDescricao());
        $sql->bindValue(':valor',$u->getValor());
        $sql->bindValue(':data',$u->getData());
        $sql->bindValue(':receita',$u->getReceita());
        $sql->bindValue(':id',$u->getId());
        $sql->execute();

        return true;

    }
    public function delete($id){

        $sql= $this->pdo->prepare(" DELETE FROM fluxo WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;

    }
}


?>