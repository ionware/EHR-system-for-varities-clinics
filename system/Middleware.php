<?php


namespace sys;

use sys\Session;


class Middleware {

    public static function Auth(){
        /*
         * Intercept the controller call to  make sure user is
         * Logged In
         *
         * */

        if (!isset($_SESSION['auth']) && !Session::start()->get('auth')){

            Redirect("/");
        }
    }

    public static function alreadyLoggedIn(){
        /*
         * Checked if User is already signed In
         * Then calls Redirect.
         * (We don't want Users on Sign In page - do we?)
         * */

        if (isset($_SESSION['auth']) && Session::start()->get('auth')){
            Redirect("/home");
        }
    }


}