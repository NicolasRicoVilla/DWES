<?php
class CuentaBancaria{
    private $saldo;

    public function __construct($saldoInicial = 0){
        $this->saldo = $saldoInicial;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }
    public function depositar($cantidad){
        if($cantidad > 0){
            $this->saldo += $cantidad;
            return true;
        }
        return false;
    }

    public function retirar($cantidad){
        if($cantidad > 0 && $this->saldo >= $cantidad){
            $this->saldo -= $cantidad;
            return true;
        }
        return false;
    }
}

