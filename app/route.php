<?php

$route->get("//", "Guest@index");
$route->get("index", "Guest@index");
$route->get("hello", "Guest@index");

$route->get("home/index", "Home@index");
