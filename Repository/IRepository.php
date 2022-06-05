<?php

namespace Repository;

use Entity\Cashier;

interface IRepository {

    public function add(Cashier $u);
    public function findAll();
    public function findById($id);
    public function findByMonth($d);
    public function update(Cashier $u);
    public function delete($id);
}

?>