<?php

namespace Elia\RajaOngkir\Handlers;

use GuzzleHttp\Client;
use Elia\RajaOngkir\RajaOngkir;

class RajaOngkirHandler extends RajaOngkir 
{
    const PROVINCE_ENDPOINT = 'provinces';

    /**
     * Get Raja Ongkir's provinces from the API
     * 
     * @return array
     */
    public function getProvinces(?string $id = '')
    {
        $provinces = $this->client->request('GET', self::PROVINCE_ENDPOINT, [
            'query' => [
                'key' => $this->api_key,
                'id' => $id,
            ],
        ]);

        return $provinces;
    }
}
