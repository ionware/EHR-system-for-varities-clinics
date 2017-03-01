<?php

$route->get("", "GuestController@index");
$route->get("index", "GuestController@index");
$route->post("verify", "GuestController@verify");

/*
 * Controllers for logged In Clinicians
 *
 * */
$route->get("home", "HomeController@index");
$route->get("home/logout", "HomeController@logout");
$route->post("home/select", "HomeController@setMrn");


/*
 * Controllers for AJAX-es call
 *
 * */

$route->get("home/ajax/billing", "PatientController@getBilling");
$route->post("home/ajax/billing", "PatientController@postBilling");

$route->get('home/ajax/allergy', 'PatientController@getAllergy');
$route->post('home/ajax/allergy', 'PatientController@postAllergy');