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

        $this->assertArrayHasKey('TipoServicio', $quotation->quotation);
    }

    public function testQuotationWithZipCodesStartingWithZero()
    {
        $cotizador = new Cotizador;

        $cotizador->setType()
                ->isPackage()
                ->setOriginZipCode('03200')
                ->setDestinyZipCode('06600')
                ->setWeight(28)
                ->setLength(34)
                ->setHeight(56)
                ->setWidth(25);

        $cotizador->quote();

        $quotation = $cotizador->getQuotation();

        $this->assertArrayHasKey('TipoServicio', $quotation->quotation);
    }

    public function testGetsQuotationParser()
    {
        $cotizador = new Cotizador;

        $cotizador->setType()
                ->isPackage()
                ->setOriginZipCode('03200')
                ->setDestinyZipCode('06600')
                ->setWeight(28)
                ->setLength(34)
                ->setHeight(56)
                ->setWidth(25);

        $cotizador->quote();

        $quotation = $cotizador->getQuotation();

        $this->assertInstanceOf(Parser::class, $quotation);
    }

    public function testGetsServiceTypeInstance()
    {
        $cotizador = new Cotizador;

        $cotizador->setType()
                ->isPackage()
                ->setOriginZipCode('03200')
                ->setDestinyZipCode('06600')
                ->setWeight(28)
                ->setLength(34)
                ->setHeight(56)
                ->setWidth(25);

        $cotizador->quote();

        $quotation = $cotizador->getQuotation();

        $groundShippingCost = $quotation->getGroundShippingCost();

        $this->assertInstanceOf(ServiceType::class, $groundShippingCost);
    }
}