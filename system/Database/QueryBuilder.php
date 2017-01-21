<?php

namespace sys\Database;

/*
* A little database abstraction class for DB tables to
* Select all, filter(Buggy), and insert data.
*
* Intended for Models to implement.
*
*/

abstract class QueryBuilder
{

    protected $pdo;
    protected $table;
    protected $mrn;

    public function __construct(\PDO $pdo){

        $this->pdo = $pdo;
    }

    public function selectAll(array $colums){

        $query = "select " . implode(", ", $colums) . " from {$this->table}";

        $statement = $this->pdo->prepare($query);

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_BOTH);
    }

    public function selectWhere(array $columns, $mrn){

        $query = "select ". implode(", ", $columns) . " from {$this->table} where mrn = ? ";

        $statement = $this->pdo->prepare($query);

        $statement->execute(array($mrn));

        return $statement->fetchAll(\PDO::FETCH_BOTH);
    }

    public function insert($columns){

        $query = "INSERT INTO {$this->table} (". implode(", ", array_keys($columns)).") VALUES(".
            implode(", ", array_map(function($param){
                return ":".$param;
            }, array_keys($columns))). ")";

        $statement = $this->pdo->prepare($query);

        try{

            $statement->execute($columns);
            return true;

        } catch(\PDOException $e){

           // var_dump($e);
           // Let the error parse_silently for now
        }
    }
}