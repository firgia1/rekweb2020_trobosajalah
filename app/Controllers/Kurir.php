<?php

namespace App\Controllers;

class Kurir extends BaseController
{
    function requestCost()
    {
        $post = [
            'key' => 'a93c1d9454cfef95ee973c56bae97e3d',
            'origin' =>  $_POST['origin'],
            'destination' => $_POST['destination'],
            'weight' => $_POST['weight'],
            'courier' => $_POST['courier']
        ];

        $ch = curl_init('https://api.rajaongkir.com/starter/cost');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    function requestAllCity()
    {
        return get_CURL("https://api.rajaongkir.com/starter/city?key=a93c1d9454cfef95ee973c56bae97e3d");
    }

    function requestCityById($id)
    {
        return get_CURL("https://api.rajaongkir.com/starter/city?key=a93c1d9454cfef95ee973c56bae97e3d&id=" . $id);
    }
}
