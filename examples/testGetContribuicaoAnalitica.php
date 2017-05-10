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
use NFePHP\Atende\Response;

$user = '<coloque sua identificação>';
$password = '<coloque sua senha>';
$cidade = '<nome da cidade>';
$codcidade = '<codigo>';

//NOTA: em caso de falha será disparado um exception
try {
    $anomes = 201612; //indique a competência (OBRIGATÓRIO) formato aaamm
    $pagina = null; //(OPCIONAL)
    $cpf = '<indique o cpf>'; //o CPF é formatado (OPCIONAL)
    $numeroMatricula = null;
    $tipo = null;//1-Ativo; 2-Aposentado; 3-Pensionista. (OPCIONAL)
    $codigoRegime = null;//1-CLTista; 2-Estaturário (OPCIONAL)


    $at = new Atende($user, $password, $cidade, $codcidade);
    //seta o ambiente 1-produção 2-homologacao
    $at->setAmbiente(2);
    //ativa debug USAR APENAS durante o desenvolvimento
    $at->setDebugMode(true);
    //define o tempo de timeout 
    //CUIDADO com esse numero deverá ser compativel com o limite 
    //de execução do PHP (ver. php.ini)
    $at->setSoapTimeOut(100);

    //NOTA: $xml irá conter o envelope SOAP retornado
    $xml = $at->getContribuicaoAnalitica(
        $anomes,
        $pagina,
        $cpf,
        $numeroMatricula,
        $tipo,
        $codigoRegime
    );

    //$json conterá os dados de retorno em uma string json
    $json = Response::toJson($xml);
    //echo "<pre>";
    //print_r($json);
    //echo "</pre>";


    //$arr conterá os dados de retorno em um array
    $arr = Response::toArray($xml);
    //echo "<pre>";
    //print_r($arr);
    //echo "</pre>";

    //$std conterá os dados de retorno em um stdClass
    $std = Response::toStd($xml);
    //echo "<pre>";
    //print_r($std);
    //echo "</pre>";

    header('Content-type: text/xml; charset=UTF-8');
    echo $xml;

} catch (\RuntimeException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}