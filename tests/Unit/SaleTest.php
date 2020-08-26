<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SaleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    // Verifica se as tabelas estão corretas e trazendo tudo perfeitamente. 

    public function check_tables_sales()
     {
         $sale = New Sale;

         $expected = [
            'name',
            'email',
            'cpf',
            'product_id',
            'date_sale',
            'sale',
            'quantity'
         ];

         $arrayCompared = array_diff($expected, $sale->getFillable());

         $this->assertEquals(0, count($arrayCompared));
     }
}
