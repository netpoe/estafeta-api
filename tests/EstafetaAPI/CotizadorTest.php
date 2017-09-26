<?php 

namespace Netpoe\EstafetaAPI;

use PHPUnit\Framework\TestCase;

class CotizadorTest extends TestCase
{
    public function testGetAPackageQuotationFromEstafeta()
    {
        $cotizador = new Cotizador;

        $cotizador->setType()
                ->isPackage()
                ->setOriginZipCode(76230)
                ->setDestinyZipCode(11510)
                ->setWeight(28)
                ->setLength(34)
                ->setHeight(56)
                ->setWidth(25);

        $cotizador->quote();

        $quotation = $cotizador->getQuotation();

        $this->assertArrayHasKey('TipoServicio', $quotation);
    }
}