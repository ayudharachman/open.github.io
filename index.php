<?php
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
        'Access-Control-Allow-Origin: *'
      ),
    ));    
    $response = curl_exec($curl);
    $err = curl_exec($curl);
    if (!$response) {
        echo json_encode($err);
    } else {
        $arr = json_decode($response, true);
        $data = array(
            'doa'       => $arr['doa'],
            'ayat'      => $arr['ayat'],
            'latin'     => $arr['latin']
        );
        print_r($data);
    }
    curl_close($curl);
?>