<?php
namespace ehr\Controllers;

use sys\Middleware;
use sys\Session;

class HomeController
{
    protected $session;

    private function applyMiddleware(){
        /*
         * All Middleware definition goes in here
         *
         * */

        Middleware::Auth();
    }

    public function __construct(){

        $this->applyMiddleware();
        $this->session = new Session();
    }

    public function index(){

        return view("home/index", NULL);
    }

    public function logout(){

        $this->session->delete('auth');
        Redirect("/");
    }
}

