<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ref extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://doa-doa-api-ahmadramadhan.fly.dev/api/doa/pergi',
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
		$error = curl_exec($curl);
		if (!$response) {
			echo json_encode($error);
		} else {
			$arr = json_decode($response, true);
			$data = array(
				'doa'	=> $arr['doa'],
				'ayat'	=> $arr['ayat'],
				'latin'	=> $arr['latin']
			);
			return $data;
		}
		curl_close($curl);
	}
}
