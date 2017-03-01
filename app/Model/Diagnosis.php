<?php

namespace ehr\Model;

use sys\Database\QueryBuilder;

class Diagnosis extends QueryBuilder
{


    protected $table = "diagnosis";

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}