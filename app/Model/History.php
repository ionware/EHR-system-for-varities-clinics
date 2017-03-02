<?php
namespace ehr\Model;

use sys\Database\QueryBuilder;

class History extends QueryBuilder
{
    protected $table = 'histories';

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}
