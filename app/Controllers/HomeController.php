<?php
namespace ehr\Controllers;

use sys\Middleware;
use sys\Session;
use sys\Database\Connection;

class HomeController
{
    protected $session;

    private function applyMiddleware()
    {
        /*
         * All Middleware definition goes in here
         *
         * */

        Middleware::Auth();
    }

    public function __construct()
    {

        $this->applyMiddleware();
        $this->session = new Session();
    }

    public function index()
    {
        $dr_name = $this->session->get("fullname");
        $patient = " You are yet to select a patient to operate on.";

        if ($this->session->get("mrn")){

            $patient = "You are now operating on {$this->session->get("patient_name")}";
        }

        return view("home/index", ["dr_name" => $dr_name, "status" => $patient]);
    }

    public function logout()
    {

        $this->session->delete('auth');
        Redirect("/");
    }

    public function setMrn()
    {
        //Much like an API, but not. Sets the Patients MRN
        //If found. [Method Refactor soon]

        header("Content-Type: application/json");

        $mrn = $_POST['mrn'];

        $config = require "../system/config.php";

        $pdo = Connection::make($config['database']);

        $query = $pdo->prepare("SELECT id, surname, firstname, lastname FROM patients WHERE id = ?");
        $query->execute(array($mrn));

        if ($patient = $query->fetch(\PDO::FETCH_OBJ)) {
            $this->session->set("mrn", $patient->id);
            $fullname = $patient->surname . " " . $patient->firstname . " " . $patient->lastname;
            $this->session->set("patient_name", $fullname);

            echo json_encode(array(
                "status" => "success",
                "data" => "You are now operating on {$fullname}"
            ));
            exit();
        }

        $this->session->delete('mrn');
        echo json_encode(array(
            "status" => "failed",
            "data" => "Oh Snap! Patient with MRN {$_POST['mrn']} was not found"
        ));

        exit();
    }


}
