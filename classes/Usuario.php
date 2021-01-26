<?php


class Usuario {
    private $id;
    private $descricao;
    private $valor;
    private $data;
    private $receita;

    public function getId() {

        return $this->id;
    }
    public function setId($i) {

        $this->id = trim($i);
    }

    public function getDescricao() {

        return $this->descricao;
    }
    public function setDescricao($d) {

        $this->descricao = ucwords(trim($d));
    }

    public function getValor() {

        return $this->valor;
    }
    public function setValor($v) {

        $this->valor = trim($v);
    }

    public function getData() {

        return $this->data;
    }
    public function setData($da) {

        $this->data = trim($da);
    }

    public function getReceita() {

        return $this->receita;
    }
    public function setReceita($r) {

        $this->receita = trim($r);
    }


}

interface UsuarioDAO {

    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByMonth($d);
    public function update(Usuario $u);
    public function delete($id);

}

?>