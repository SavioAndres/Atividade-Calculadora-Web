<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;
use \Business\Calculadora;

class Index extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        return '{"title": "Calculadora WEB"}';
    }

    public function post(array $post) : string
    {
        $calculadora = new Calculadora($post['operacao'], $post['number1'], $post['number2']);
        $resultado = $calculadora->calcular();
        $historico = $calculadora->historico();
        return '{"resultado": "' . $resultado . '", "historico": ' . $historico . '}';
    }

    public function put(array $request, array $put) : string
    {
        return '';
    }

    public function patch(array $request, array $patch) : string
    {
        return '';
    }

    public function delete(array $request) : string
    {
        return '';
    }

}