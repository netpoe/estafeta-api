<?php 

namespace Netpoe\EstafetaAPI;

class Cotizador
{
    const URL = 'http://movil.estafeta.com/Servicios/Cotizador.aspx';

    public $type;
    public $isPackage;
    public $originZipCode;
    public $destinyZipCode;
    public $weight;
    public $length;
    public $height;
    public $width;
    public $quotation = [];

    public function setType(String $type = 'N')
    {
        $this->type = $type;

        return $this;
    }

    public function isPackage(String $isPackage = 'true')
    {
        $this->isPackage = $isPackage;
        
        return $this;
    }

    public function setOriginZipCode(Int $originZipCode)
    {
        $this->originZipCode = $originZipCode;

        return $this;
    }

    public function setDestinyZipCode(Int $destinyZipCode)
    {
        $this->destinyZipCode = $destinyZipCode;

        return $this;
    }

    public function setWeight(Int $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    public function setLength(Int $length)
    {
        $this->length = $length;

        return $this;
    }

    public function setHeight(Int $height)
    {
        $this->height = $height;

        return $this;
    }

    public function setWidth(Int $width)
    {
        $this->width = $width;

        return $this;
    }

    public function setQuotation(Array $quotation)
    {
        $this->quotation = $quotation;

        return $this;
    }

    public function getQuotation(): Array
    {
        return $this->quotation;
    }

    public function getData(): Array
    {
        return [
            'Tipo' => $this->type,
            'esPaquete' => $this->isPackage,
            'CPOrigen' => $this->originZipCode,
            'CPDestino' => $this->destinyZipCode,
            'Peso' => $this->weight,
            'Largo' => $this->length,
            'Alto' => $this->height,
            'Ancho' => $this->width,
        ];
    }

    public function quote()
    {
        $ch = curl_init(self::URL);

        $data = $this->getData();

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
        ];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        $response = json_decode(curl_exec($ch), true);

        curl_close($ch);

        $this->setQuotation($response);

        return $this;
    }
}