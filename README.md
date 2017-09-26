# Estafeta API

API no oficial para cotizar sobres y paquetes nacionales

## Uso

```php
<?php 

namespace Netpoe\EstafetaAPI;

class CotizadorTest
{
    public function testGetQuotation()
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
    }
}
```

Tendrás un resultado como este: 

```php
Array
(
    [TipoEnvio] => Paquete
    [Origen] => 76230
    [Destino] => 11510, MIGUEL HIDALGO, DISTRITO FEDERAL
    [Mod_Frecuencia] => Diaria
    [Mod_OcurreForzoso] => No
    [CostoReexp] => No
    [Error] =>
    [DescError] =>
    [Especificaciones] => 28 kg, 56x34x25 cm
    [TipoServicio] => Array
        (
            [0] => Array
                (
                    [DescripcionServicio] => 09:30
                    [TarifaBase] => $319.97
                    [CC] => $24.86
                    [CargosExtra] => $0.00
                    [CostoSobrePeso] => $858.00
                    [CCSobrePeso] => $66.55
                    [CostoTotal] => $1269.38
                )

            [1] => Array
                (
                    [DescripcionServicio] => 11:30
                    [TarifaBase] => $191.18
                    [CC] => $14.85
                    [CargosExtra] => $0.00
                    [CostoSobrePeso] => $797.58
                    [CCSobrePeso] => $62.1
                    [CostoTotal] => $1065.71
                )

            [2] => Array
                (
                    [DescripcionServicio] => Dia Sig.
                    [TarifaBase] => $155.98
                    [CC] => $12.12
                    [CargosExtra] => $0.00
                    [CostoSobrePeso] => $496.8
                    [CCSobrePeso] => $38.34
                    [CostoTotal] => $703.24
                )

            [3] => Array
                (
                    [DescripcionServicio] => 2 Dias
                    [TarifaBase] => $142.39
                    [CC] => $11.06
                    [CargosExtra] => $0.00
                    [CostoSobrePeso] => $581.58
                    [CCSobrePeso] => $45.36
                    [CostoTotal] => $780.39
                )

            [4] => Array
                (
                    [DescripcionServicio] => Terrestre
                    [TarifaBase] => $155.18
                    [CC] => $12.06
                    [CargosExtra] => $0.00
                    [CostoSobrePeso] => $147.2
                    [CCSobrePeso] => $11.5
                    [CostoTotal] => $325.94
                )

        )

    [diasEntrega] => Array
        (
            [Lun] => X
            [Mar] => X
            [Mie] => X
            [Jue] => X
            [Vie] => X
            [Sab] => X
            [Dom] =>
        )

)
```
