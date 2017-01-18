<?php
namespace sys\Auth;

use sys\Session;

class AuthenticationService
{
    protected $pdo, $username, $password, $session;


    public function __construct(\PDO $pdo, $username, $password){
        $this->pdo = $pdo;
        $this->username = $username;
        $this->password = $password;

        $this->session = new Session();
    }

    protected function findUserHash(){

        $query = $this->pdo->prepare("SELECT password FROM clinicians WHERE email = ?");
        $query->execute([$this->username]);

        if( $row = $query->fetch(\PDO::FETCH_OBJ)){
            return $row->password;
        }

        return false;

    }

    protected function verifyHash($hash){

        if(password_verify($this->password, $hash)){

            //Sets ENV variables for Authenticated Users.
            $this->tokenizer();

            return true;
        } else {

            return false;
        }

    }

    protected function tokenizer(){

        $query = $this->pdo->prepare("SELECT id, title, fname, lname FROM clinicians WHERE email = ?");

        $query->execute([$this->username]);
        $row = $query->fetch(\PDO::FETCH_OBJ);

        $fullname = $row->title . " " . $row->fname. " ". $row->lname;
        $token = bin2hex(openssl_random_pseudo_bytes(rand(12, 32)));
        $id = $row->id;

        $this->session->set("id", $id);
        $this->session->set("fullname", $fullname);
        $this->session->set("auth", $token);
    }

    public function validate(){

        if($hash = $this->findUserHash()){

            return $this->verifyHash($hash);
        } else {

            return false;
        }
    }
}
