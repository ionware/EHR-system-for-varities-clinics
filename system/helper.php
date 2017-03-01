<?php

//Utility Functions

function view($view, $data){
    //Used by Controllers classes to render
    // corresponding view files and extracting Datas.

    try{

        @extract($data);

    } catch(Exception $e) {

        //Pass silently cuz there's no data.
    }

    return require "../app/views/{$view}.view.php";
}

function dd($data){
    //Similar to Laravel's dieANDdump function.

    die(var_dump($data));

}

function Redirect($to)
{
    //Sends a new header

    header("Location: " . $to);
    exit();

}

function loadConfig(){
    /*
     * Loads configuration file as per call
     *
     * */

    return require "config.php";
}

function hashString($byte){
    /*
     * Returns random string based on openssl_random_psuedo_string
     *
     */

    return bin2hex(openssl_random_pseudo_bytes(rand(8, $byte)));
}

