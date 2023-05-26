<?php
session_start();
class Banco {
    public $conta;
    public $saldo;

    public function depositar($valor) { 
        if($valor <= 10) {
            echo "Valor inferior";
        }
        else{
            $this->saldo += $valor;
        }
    }

    public function sacar($valor) {
        $this->saldo -= $valor;
    }
}

?>
