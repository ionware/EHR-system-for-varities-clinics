<?php

namespace ehr\Model;

use sys\Database\QueryBuilder;

class Medication extends QueryBuilder
{


    protected $table = "medications";

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}