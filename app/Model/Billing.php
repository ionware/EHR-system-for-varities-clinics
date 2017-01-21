<?php

namespace ehr\Model;

use sys\Database\QueryBuilder;

class Billing extends QueryBuilder
{


    protected $table = "Billing";

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}