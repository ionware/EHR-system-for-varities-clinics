<?php
namespace ehr\Model;

use sys\Database\QueryBuilder;

class Laboratory extends QueryBuilder
{
    protected $table = 'laboratory';

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}
