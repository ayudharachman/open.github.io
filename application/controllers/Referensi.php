<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Referensi extends REST_Controller {
	function __construct($config = '') {
        parent::__construct($config);
    }

	function index_get() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://calendarific.com/api/v2/holidays?api_key=0191c99136b1bae3a5d97514026ee05c5671dd5d&country=ID&year=2022',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));
		$response = curl_exec($curl);
		$error = curl_error($curl);
		if (!$response) {
			echo json_encode($error);
		} else {
			$obj = json_decode($response);
			print_r($obj);
		}
		curl_close($curl);
	}
	
	public function getdoa_get() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://doa-doa-api-ahmadramadhan.fly.dev/api/doa/makan',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Origin: *',
            'Access-Control-Allow-Origin: *'
        ),
        ));

        $response = curl_exec($curl);
		$err = curl_error($curl);
		if (!$response) {
			echo json_encode($err);
		} else {
			$arrJson = json_decode($response, true);
			$data = array(
				'doa'		=> $arrJson['doa'],
				'artinya'	=> $arrJson['artinya']
			);
			print_r($data);
		}
        curl_close($curl);
    }
}
