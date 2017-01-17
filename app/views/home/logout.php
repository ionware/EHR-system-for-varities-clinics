<?php
require_once(__DIR__."/../bootstrap.php");
$session = new ehr\Session();
(ehr\Auth\Auth::logOut());
header("Location: /");