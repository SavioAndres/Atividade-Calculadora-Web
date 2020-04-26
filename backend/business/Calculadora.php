<?php

namespace Business;

class Calculadora
{
    private $operacao;
    private $number1;
    private $number2;

    public function __construct($operacao, $number1, $number2)
    {
        $_SESSION['historico'] = array();
        $this->operacao = $operacao;
        $this->number1 = $number1;
        $this->number2 = $number2;
        self::valoreVazios();
    }

    public function calcular(): string
    {
        if (self::verificarTipos()) {
            switch ($this->operacao) {
                case '+':
                    $resultado = $this->number1 + $this->number2;
                break;
                case '-':
                    $resultado = $this->number1 - $this->number2;
                break;
                case '*':
                    $resultado = $this->number1 * $this->number2;
                break;
                case '/':
                    $resultado = $this->number1 / $this->number2;
                break;
                default:
                    $resultado = 'Operação inválida!';
                break;
            }
        } else {
            $resultado = 'É aceito somente números';
        }
        self::salvarHistorico($resultado);
        return $resultado;
    }

    public function historico()
    {
        return \json_encode($_SESSION['historico']);
    }

    private function salvarHistorico($resultado)
    {
        $hist = $_SESSION['historico'];
        $historico_ = array('number1' => $this->number1, 'operacao' => $this->operacao, 'number2' => $this->number2, 'resultado' => $resultado);
        \array_push($hist, $historico_);
        $_SESSION['historico'] = $hist;
    }

    private function verificarTipos(): bool
    {
        return is_numeric($this->number1) && is_numeric($this->number2);
    }

    private function valoreVazios()
    {
        if (empty($this->number1)) {
            $this->number1 = 0;
        }
        if (empty($this->number2)) {
            $this->number2 = 0;
        }
    }
}
