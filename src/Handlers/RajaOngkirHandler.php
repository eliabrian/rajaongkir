<?php

namespace Elia\RajaOngkir\Handlers;

use GuzzleHttp\Client;
use Elia\RajaOngkir\RajaOngkir;

class RajaOngkirHandler
{
    const PROVINCE_ENDPOINT = 'province';

    /**
     * The RajaOngkir API Key
     * 
     * @var string 
     */
    public string $api_key;

    /**
     * The RajaOngkir Account Type
     * 
     * @var string 
     */
    public string $type;

    /**
     * Create a new Raja Ongkir Handler instance
     * 
     * @param string $api_key
     * @param string $type
     */
    public function __construct (string $api_key, string $type)
    {
        $this->api_key = $api_key;
        $this->type = $type;
    }

    /**
     * Initialize new Guzzle Client
     * 
     */
    public function init()
    {
        $request = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'timeout' => 20.0,
            'base_uri' => 'https://api.rajaongkir.com/',
        ];

        return new Client($request);
    }

    /**
     * Get Raja Ongkir's provinces from the API
     * 
     * @return array
     */
    public function getProvinces(?string $id = '')
    {
        $client = $this->init();

        $response = $client->request('GET', $this->type . '/' . self::PROVINCE_ENDPOINT, [
            'query' => [
                'id' => $id,
                'key' => $this->api_key,
            ]
        ]);

        $provinces = json_decode($response->getBody());
        return $provinces;
    }
}
