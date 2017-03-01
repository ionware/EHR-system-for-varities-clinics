<?php

namespace ehr\Model;

use sys\Database\QueryBuilder;

class Immunization extends QueryBuilder
{


    protected $table = "immunizations";

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}