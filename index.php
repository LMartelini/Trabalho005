<?php

include("banco.php");

    class Cliente extends Banco{ // cliente extende de banco, ou seja, tudo que está em banco vai para cliente, exceto nome e cpf. A classe foi estendida
        public $nome;
        public $cpf;
        public $possui_emprestimo = false;
        public $valorEmprestimo = 0;

        public function emprestimo($valor) {
            if($this->possui_emprestimo) {
                echo "Infelizmente não podemos abrir outro empréstimo ";
            }
            else {
                $this->possui_emprestimo = true;
                $this->depositar($valor);
                $this->valorEmprestimo = $valor;
            }
        }

        public function quitar_emprestimo($valor) {
            if($this->valorEmprestimo == $valor) {
                $this->saldo -= $valor;
                echo "Quitação feita com sucesso ";
            }
            else{
                echo "Valor de quitação incorreto, o valor correto eh: " . $this->valorEmprestimo;
            }
        }

    }

    $pessoa = new Cliente();
    $pessoa->nome = "Josefina";
    $pessoa->cpf = "11111111";
    $pessoa->saldo = 1000;
    $pessoa->depositar(800);

    echo "<br>";
    $pessoa->emprestimo(7000);
    echo "O saldo atual de pessoa é: " . $pessoa->saldo;
    echo "<br>";
    $pessoa->quitar_emprestimo(7000);
?>
