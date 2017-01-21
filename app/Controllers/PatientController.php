<?php

namespace ehr\Controllers;

use sys\Session;
use sys\Database\Connection;
use sys\Middleware;
use ehr\Model;

class PatientController
{
    protected $session;
    protected $config;

    private function applyMiddleware(){

        Middleware::Auth();

        Middleware::requireMRN();
    }

    private function getMrn(){

        return $this->session->get('mrn');
    }

    public function __construct(){

        $this->session = new Session();
        $this->applyMiddleware();
        $this->config = Connection::make(loadConfig()['database']);

    }

    public function billing(){

        $billing = new Model\Billing($this->config, $this->getMrn());

        return view("/home/ajax/billing",
            array("billings" => $billing->selectWhere(['serial', 'reason', 'payer_name', 'status', 'date'],
                                $this->session->get('mrn')),

                "patient_name" => $this->session->get("patient_name")
            ));



    }
}