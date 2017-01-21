<?php
namespace sys;

/*
 * Handles Setting and Unsetting of
 * Session using the PHP Session Component
 *
 * */

class Session {
    /*
     * No Contract Provided. Class has 3 Methods:
     * (1) set($key, $data) which puts $data into Session with $key
     * (2) get($key) @return [string] Retrieves Key
     * (3) delete($key) Remove Data from Session with key $key
     *
     * */

    public static function start(){

        @session_start();    //Starts Session
        return new static;
    }

    public function set($key, $data){
        //Flashes Data Into Session

        $_SESSION[$key] = $data;
    }

    public function get($key){
        //Retrieve Data from Session with corres. Key

           if(isset($_SESSION[$key]) && $_SESSION[$key]){
               return $_SESSION[$key];
           } else{
               return false;
           }

    }

    public function delete($key){
        //Deletes Session from Session Handler

        if(isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }
}