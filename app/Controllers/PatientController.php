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

    /*
     * Controller Method for Medication
     * */
    public function getMedication()
    {
        $medications = new Model\Medication($this->config, $this->getMrn());
        return view('home/ajax/medication', array(
            "medications" => $medications->selectWhere(['medication', 'reason', 'administer', 'created_at'], $this->getMrn()),
            "patient_name" => $this->session->get("patient_name")
        ));
    }

    public function postMedication()
    {
        $formData = $_POST;
        $formData['mrn'] = $this->session->get('mrn');
        $formData['created_at'] = Carbon::now();
        $formData['updated_at'] = Carbon::now();

        $reply = new Model\Medication($this->config, $this->getMrn());
        $reply->insert($formData);
        return header('Location: /home');
    }

    /*
     * Controllers for Immunization
     * */
    public function getImmunization()
    {
        $immunizations = new Model\Immunization($this->config, $this->getMrn());
        return view('home/ajax/immunization', array(
            "immunizations" => $immunizations->selectWhere(['vaccine', 'type', 'administer', 'next_dose', 'created_at'], $this->getMrn()),
            "patient_name" => $this->session->get("patient_name")
        ));
    }

    public function postImmunization()
    {
        $formData = $_POST;
        $formData['mrn'] = $this->session->get('mrn');
        $formData['created_at'] = Carbon::now();
        $formData['updated_at'] = Carbon::now();

        $reply = new Model\Immunization($this->config, $this->getMrn());
        $reply->insert($formData);
        return header('Location: /home');
    }

    /*
     * Controller for Diagnosis
     * */
    public function getDiagnosis()
    {
        $diagnosis = new Model\Diagnosis($this->config, $this->getMrn());
        return view('home/ajax/diagnosis', array(
            "diagnosis" => $diagnosis->selectWhere(['diagnosis', 'symptoms', 'administer', 'created_at'], $this->getMrn()),
            "patient_name" => $this->session->get("patient_name")
        ));
    }

    public function postDiagnosis()
    {
        $formData = $_POST;
        $formData['mrn'] = $this->session->get('mrn');
        $formData['created_at'] = Carbon::now();
        $formData['updated_at'] = Carbon::now();

        $reply = new Model\Diagnosis($this->config, $this->getMrn());
        $reply->insert($formData);
        return header('Location: /home');
    }

    /*
     * Controllers for Medication History
     * */

    public function getHistory()
    {
        $histories = new Model\History($this->config, $this->getMrn());
        return view('home/ajax/history', array(
            "histories" => $histories->selectWhere(['report', 'created_at'], $this->getMrn()),
            "patient_name" => $this->session->get("patient_name")
        ));
    }

    public function postHistory()
    {
        $formData = $_POST;
        $formData['mrn'] = $this->session->get('mrn');
        $formData['created_at'] = Carbon::now();
        $formData['updated_at'] = Carbon::now();

        $reply = new Model\History($this->config, $this->getMrn());
        $reply->insert($formData);
        return header('Location: /home');
    }

    /*
     * Controllers for laboratory tests
     * */
    public function getLab()
    {
        $diagnosis = new Model\Diagnosis($this->config, $this->getMrn());
        return view('home/ajax/diagnosis', array(
            "diagnosis" => $diagnosis->selectWhere(['diagnosis', 'symptoms', 'administer', 'created_at'], $this->getMrn()),
            "patient_name" => $this->session->get("patient_name")
        ));
    }

    public function postLab()
    {
        $formData = $_POST;
        $formData['mrn'] = $this->session->get('mrn');
        $formData['created_at'] = Carbon::now();
        $formData['updated_at'] = Carbon::now();

        $reply = new Model\Laboratory($this->config, $this->getMrn());
        $reply->insert($formData);
        return header('Location: /home');
    }
}