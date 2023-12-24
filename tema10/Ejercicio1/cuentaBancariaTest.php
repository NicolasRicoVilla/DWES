<?php
require_once '../../vendor/autoload.php';
require_once 'cuentaBancaria.php';

 
use PHPUnit\Framework\TestCase;



class cuentaBancariaTest extends TestCase{
    
     public function testE1devolverSaldoCorrecto(){
        
        $saldoIncial = 100;
        
        $cuenta = new CuentaBancaria($saldoIncial);
        $saldo = $cuenta->getSaldo();

         $this->assertEquals($saldoIncial, $saldo);

     }

    public function testdepositarCantidadCorrecta(){
        $cantidadTotal = 100;
        $cuenta = new CuentaBancaria($cantidadTotal);

        $cantidadDepositada = 50;
        $cuenta->depositar($cantidadDepositada);

        $resultado = $cantidadDepositada + $cantidadTotal;

        $this->assertEquals($resultado, $cuenta->getSaldo());
    }

    public function testnoDepositarCNegativa(){
        $cantidad = 100;

        $cuenta = new CuentaBancaria($cantidad);

        $cantidadN = -20;

        $cuenta->depositar($cantidadN);

        $this->assertEquals(100,$cuenta->getSaldo());


    }


    public function testRetirarReduceSaldoConCantidadValida() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Retirar una cantidad válida
        $cantidadRetiro = 50;
        $cuenta->retirar($cantidadRetiro);

        // Verificar que el saldo se haya reducido correctamente
        $this->assertEquals(50, $cuenta->getSaldo());
    }

    public function testNoRetirarConCantidadMayorAlSaldo() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Intentar retirar una cantidad mayor al saldo actual
        $cantidadRetiroMayor = 150;
        $cuenta->retirar($cantidadRetiroMayor);

        // Verificar que el saldo no haya cambiado
        $this->assertEquals(100, $cuenta->getSaldo());
    }

    public function testNoRetirarConCantidadNegativa() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Intentar retirar una cantidad negativa
        $cantidadNegativaRetiro = -20;
        $cuenta->retirar($cantidadNegativaRetiro);

        // Verificar que el saldo no haya cambiado
        $this->assertEquals(100, $cuenta->getSaldo());
    }

    public function testSaldoDespuesDeTransacciones() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Realizar algunas transacciones (depósitos y retiros)
        $cuenta->depositar(50);
        $cuenta->retirar(30);
        $cuenta->depositar(20);
        $cuenta->retirar(10);

        // Verificar que el saldo sea el esperado después de las transacciones
        $this->assertEquals(130, $cuenta->getSaldo());
    }

    public function testRetirarMasDineroDelDisponible() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Intentar retirar más dinero del disponible
        $retiroExcesivo = 120;
        $cuenta->retirar($retiroExcesivo);

        // Verificar que el saldo no sea negativo
        $this->assertEquals(100, $cuenta->getSaldo());
    }

    public function testDepositarCantidadGrande() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Depositar una cantidad grande
        $cantidadGrande = 1000000;
        $cuenta->depositar($cantidadGrande);

        // Verificar que el saldo se haya actualizado correctamente
        $this->assertEquals(1000100, $cuenta->getSaldo());
    }

    public function testRetirarMasDineroDelDisponibleDevuelveFalse() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Intentar retirar más dinero del disponible
        $retiroExcesivo = 120;
        $resultadoRetiro = $cuenta->retirar($retiroExcesivo);

        // Verificar que el método retirar() devuelva false
        $this->assertFalse($resultadoRetiro);

        // Verificar que el saldo no se haya modificado
        $this->assertEquals(100, $cuenta->getSaldo());
    }

    public function testSecuenciaDepositosYRetiros() {
        $cuenta = new CuentaBancaria(100); // Saldo inicial de 100

        // Realizar una secuencia de depósitos y retiros
        $cuenta->depositar(50);
        $this->assertEquals(150, $cuenta->getSaldo()); // Verificar que el saldo se haya actualizado correctamente

        $cuenta->retirar(30);
        $this->assertEquals(120, $cuenta->getSaldo()); // Verificar que el saldo se haya actualizado correctamente

        $cuenta->depositar(20);
        $this->assertEquals(140, $cuenta->getSaldo()); // Verificar que el saldo se haya actualizado correctamente

        $cuenta->retirar(10);
        $this->assertEquals(130, $cuenta->getSaldo()); // Verificar que el saldo se haya actualizado correctamente
    }

    public function testPropiedadSaldoNoModificableDesdeFuera() {
        
        
        $cuenta = new CuentaBancaria(100);

        // Utiliza reflexión para acceder directamente a la propiedad 'saldo' y modificarla
        $reflection = new ReflectionClass($cuenta);
        $property = $reflection->getProperty('saldo');

        //$reflection->getProperties(); sirve para ver lo que almacena $reflection

        $property->setAccessible(true);
        $property->setValue($cuenta, 500);


        // Verifica que la propiedad 'saldo' no se ha modificado directamente
        $this->assertEquals(1000, $cuenta->getSaldo());
    }
}


?>