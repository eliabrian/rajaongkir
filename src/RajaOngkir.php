<?php

namespace Elia\RajaOngkir;

use Dotenv\Dotenv;
use Elia\RajaOngkir\Handlers\RajaOngkirHandler;

class RajaOngkir {

    /**
     * The Raja Ongkir Handler
     * 
     * @var Elia\RajaOngkir\Handlers\RajaOngkirHandler; 
     */
    public $handler;

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
    public function __construct(string $api_key, string $type = 'starter')
    {
        $this->api_key = $api_key;
        $this->type = $type;

        $this->handler = new RajaOngkirHandler($this->api_key, $this->type);
    }    

    /**
     * Get all the Raja Ongkir's provinces
     * 
     * @return object
     */
    public function provinces() : object
    {   
        return $this->handler->getProvinces();
    }

    /**
     * Retrive one Raja Ongkir's province
     * 
     * @param string id Raja Ongkir's province ID
     * @return object
     */
    public function province(string $id) : object
    {
        return $this->handler->getProvinces($id);
    }
}