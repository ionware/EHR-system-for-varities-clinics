<?php


namespace sys;

use sys\Session;


class Middleware {

    public static function Auth(){
        /*
         * Intercept the controller to  make sure user is
         * Logged In
         *
         * */

        if (!isset($_SESSION['auth']) && !Session::start()->get('auth')){

            Redirect("");
        }


    }
}