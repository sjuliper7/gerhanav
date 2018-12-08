<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class RajaOngkirController extends Controller
{
    private $client;

    public function getProvinces(){
        $this->client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/',
            'headers' => [
                "key" => env("RAJAONGKIR_KEY")
            ]
        ]);

        $response = $this->client->request('GET','province');
        $provinces = json_decode($response->getBody()->getContents());

        return $provinces->rajaongkir->results;
    }

    public function getCities(Request $request){

        $this->client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/',
            'headers' => [
                "key" => env("RAJAONGKIR_KEY")
            ]
        ]);

        $response = $this->client->request('GET','city?province=' .$request["province_id"]);
        $cities = json_decode($response->getBody()->getContents());

        return $cities->rajaongkir->results;
    }

    public function getSubdistricts(Request $request){
        $this->client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/',
            'headers' => [
                "key" => env("RAJAONGKIR_KEY")
            ]
        ]);

        $response = $this->client->request('GET','subdistrict?city=' .$request["city_id"]);
        $subdistricts = json_decode($response->getBody()->getContents());

        return $subdistricts->rajaongkir->results;
    }

    public function estimateCost(Request $request){

        $client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/',
            'headers' => [
                "key" => env('RAJAONGKIR_KEY'),
                "Content-Type" => "application/x-www-form-urlencoded"
            ]
        ]);

        $response = $client->request('POST', 'cost', ['form_params' => [
                'origin' => 481,
                'originType' => 'city',
                'destination' => $request["subdistrict_id"],
                'destinationType' => 'subdistrict',
                'weight' => 1000,
                'courier' => 'jne',
            ]
        ]);
        $costs = json_decode($response->getBody()->getContents());
        $cost = $costs->rajaongkir->results[0]->costs[1]->cost;
        return $cost;
    }
}
