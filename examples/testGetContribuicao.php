<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

/**
 * NOTA: Se não houver indicação de CPF ou da matricula os dados retornados 
 * pode ser ENORMES e causar TIMEOUT ou até impossibilitar a visualização pelo
 * browser
 */

use NFePHP\Atende\Atende;

$user = '<coloque sua identificação>';
$password = '<coloque sua senha>';
$cidade = '<nome da cidade>';

try {
    $codigoCliente = 0; //indique o numero do municipio
    $mesAno = 201612;
    $pagina = 1;
    $cpf = '<indique o cpf>'; //o CPF é formatado
    $numeroMatricula = null;
    $tipo = 1;
    $codigoRegime = 2;
    
    $at = new Atende($user, $password, $cidade);
    $at->setDebugMode(true);
    $at->setSoapTimeOut(100);

    $resp = $at->getContribuicao(
        $codigoCliente,
        $mesAno,
        $pagina,
        $cpf,
        $numeroMatricula,
        $tipo,
        $codigoRegime
    );
    header('Content-type: text/xml; charset=UTF-8');
    echo $resp;
    
} catch (\RuntimeException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}   

