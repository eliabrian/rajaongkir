<?php

namespace Elia\RajaOngkir\Test;

use Elia\RajaOngkir\RajaOngkir;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected RajaOngkir $rajaOngkir;

    public function setup() : void
    {
        $this->rajaOngkir = new RajaOngkir('c0a0ec8e6e2081c3bcda18173aa7be34');
    }

    public function testCanGetAllProvinces() : void
    {
        $provinces = $this->rajaOngkir->provinces();
        $this->assertEquals(200, $provinces->rajaongkir->status->code);
    }

    public function testCanGetAProvince() : void
    {
        $province = $this->rajaOngkir->province(1);
        $this->assertEquals(200, $province->rajaongkir->status->code);
    }
}
