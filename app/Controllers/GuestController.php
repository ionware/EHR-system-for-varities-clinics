<?php

namespace ehr\Controllers;

use sys\Middleware;
use sys\Database\Connection;
use sys\Auth\AuthenticationService;

class GuestController
{

    protected $config;

    private function applyMiddleware(){
        /*
         * Middlewares to apply
         *
         * */

        Middleware::alreadyLoggedIn();
    }

    public function __construct(){

        $this->config = require "../system/config.php";

        $this->applyMiddleware();
    }

    public function index(){

        return view("index", NULL);
    }

    public function verify(){

        $username = $_POST['email'];
        $password = $_POST['password'];

        $auth = new AuthenticationService(Connection::make($this->config['database']), $username, $password);

        if ($auth->validate()){

            Redirect("home/");

        } else {

            Redirect("/");
        }

    }
}