<?php

namespace Elia\RajaOngkir;

use Elia\RajaOngkir\Handlers\RajaOngkirHandler;
use GuzzleHttp\Client;

class RajaOngkir {

    /**
     * The RajaOngkir API Key
     * 
     * @var string 
     */
    public string $api_key = '';

    /**
     * The RajaOngkir Account Type
     * 
     * @var string 
     */
    public string $type = '';
    
    /**
     * Guzzle's Client
     * 
     * @var Client 
     */
    protected string $client;

    /**
     * Custom RajaOngkir Hanlder
     * 
     * @var RajaOngkirHandler 
     */
    private string $handler;

    /**
     * Create a new Raja Ongkir instance
     * 
     * @param string $api_key
     */
    public function __construct (string $api_key, string $type = 'starter')
    {
        $this->api_key = $api_key;
        $this->type = $type;

        $request = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'timeout' => 20.0,
            'base_uri' => config('api.api_url'),
        ];

        $this->client = new Client($request);

        $this->handler = new RajaOngkirHandler();
    }

    /**
     * Get all the Raja Ongkir's provinces
     * 
     * @return array
     */
    public function provinces()
    {
        return $this->handler->getProvinces();
    }

    /**
     * Retrive one Raja Ongkir's province
     * 
     * @param string id Raja Ongkir's province ID
     * @return array
     */
    public function province(string $id)
    {
        return $this->handler->getProvinces($id);
    }
}