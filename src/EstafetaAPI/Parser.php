<?php

namespace Netpoe\EstafetaAPI;

class Parser
{
    public $quotation = [];

    public $serviceTypes = [];

    public function __construct(Array $quotation)
    {
        $this->quotation = $quotation;

        $this->setServiceTypes();
    }

    public function setServiceTypes()
    {
        if (!array_key_exists('TipoServicio', $this->quotation)) {
            return $this;
        }

        if (!$this->quotation['TipoServicio']) {
            return $this;
        }

        $this->serviceTypes = $this->quotation['TipoServicio'];

        return $this;
    }

    public function getGroundShippingCost()
    {
        if (!$this->quotation) {
            return $this;
        }

        return new ServiceType($this->parseResult('Terrestre'));
    }

    public function parseResult(String $type)
    {
        $result = array_values(array_filter($this->serviceTypes, function($types) use ($type) {
            return $types['DescripcionServicio'] == $type;
        }));

        return $result ? $result[0] : null;
    }
}
