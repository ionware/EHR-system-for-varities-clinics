<?php

namespace ehr\Controllers;

use sys\Session;
use sys\Database\Connection;
use sys\Middleware;
use ehr\Model;
use Carbon\Carbon;

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

    public function getBilling(){

        $billing = new Model\Billing($this->config, $this->getMrn());

        return view("/home/ajax/billing",
            array("billings" => $billing->selectWhere(['serial', 'reason', 'payer_name', 'status', 'date'],
                                $this->session->get('mrn')),

                "patient_name" => $this->session->get("patient_name")
            ));

    }

    public function postBilling(){
        /*
         * Serialize Billing POST data and Log it into Patient's
         * Database Record. */

        $formData = $_POST;
        $formData["serial"] = hashString(10);
        $formData["mrn"] = $this->session->get("mrn");

        $reply = new Model\Billing($this->config, $this->getMrn());
        $reply = $reply->insert($formData);
        return header("Location: /home");
    }

    /*
     * Controller Methods for Allergies
     * */
    public function getAllergy(){
        $allergies = new Model\Allergy($this->config, $this->getMrn());

        return view('home/ajax/allergy', array(
            "allergies" => $allergies->selectWhere(['allergy', 'symptoms', 'cure', 'created_at'], $this->getMrn()),
            "patient_name" => $this->session->get("patient_name")
        ));
    }

    public function postAllergy(){
        $formData = $_POST;
        $formData['mrn'] = $this->session->get('mrn');
        $formData['created_at'] = Carbon::now();
        $formData['updated_at'] = Carbon::now();

       // dd($formData);

        $reply = new Model\Allergy($this->config, $this->getMrn());
        $reply = $reply->insert($formData);

        return header('Location: /home');
    }
}