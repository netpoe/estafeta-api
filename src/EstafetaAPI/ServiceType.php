<?php

namespace Netpoe\EstafetaAPI;

class ServiceType
{
    public $serviceType = [];

    public $base;

    public $baseTax;

    public $extraCharges;

    public $overweightCost;

    public $overweightCostTax;

    public $totalCost;
    
    public function __construct(Array $serviceType = null)
    {
        $this->serviceType = $serviceType;

        if ($this->serviceType) {
            $this->base = $this->serviceType['TarifaBase'];

            $this->baseTax = $this->serviceType['CC'];

            $this->extraCharges = $this->serviceType['CargosExtra'];

            $this->overweightCost = $this->serviceType['CostoSobrePeso'];

            $this->overweightCostTax = $this->serviceType['CCSobrePeso'];

            $this->totalCost = $this->serviceType['CostoTotal'];
        }
    }
}
