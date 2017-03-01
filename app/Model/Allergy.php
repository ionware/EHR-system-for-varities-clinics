<?php
namespace ehr\Model;

use sys\Database\QueryBuilder;

class Allergy extends QueryBuilder
{
    protected $table = 'allergies';

    public function __construct(\PDO $pdo, $mrn){

        $this->pdo = $pdo;
        $this->mrn = $mrn;
        return $this;

    }
}
