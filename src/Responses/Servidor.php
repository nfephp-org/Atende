<?php

namespace NFePHP\Atende\Responses;

use DOMDocument;
use DOMElement;
use stdClass;
use NFePHP\Atende\Responses\Base;

class Servidor extends Base
{
    private static $properties = [
        "numeroMatricula",
        "tipoContrato",
        "admissao",
        "rescisao",
        "afastado",
        "nivel",
        "codigoRegime",
        "descricaoRegime",
        "classificacaoCentroCusto",
        "descricaoCentroCusto",
        "codigoCargo",
        "descricaoCargo",
        "professor",
        "inicioPrevidencia",
        "fundo",
        "ultimaBaseContribuicao",
        "tipoAposentadoria",
        "possuiParidade",
        "inicioMolestiaGrave",
        "tipoPensao",
        "relacaoPensao",
        "numeroMatriculaOrigem",
        "nomeOrigem",
        "sexoOrigem",
        "nascimentoOrigem",
        "cpfOrigem",
        "inicioPensao",
        "nome",
        "cpf",
        "rg",
        "numeroCtps",
        "serieCtps",
        "estadoCtps",
        "pis",
        "nascimento",
        "obito",
        "sexo",
        "estadoCivil",
        "pai",
        "mae",
        "natural",
        "nacionalidade",
        "numeroTituloEleitor",
        "secaoTituloEleitor",
        "zonaTituloEleitor",
        "logradouro",
        "numero",
        "complemento",
        "cep",
        "bairro",
        "cidade",
        "estado"
    ];
    
    public static function render(DOMDocument $dom)
    {
        $ret = [];
        $itens = $dom->getElementsByTagName('item');
        foreach ($itens as $item) {
            $newdoc = new DOMDocument('1.0', 'utf-8');
            $newdoc->appendChild($newdoc->importNode($item, true));
            $xml = $newdoc->saveXML();
            $newdoc = null;
            $xml = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $xml);
            $xml = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $xml);
            $resp = simplexml_load_string($xml, null, LIBXML_NOCDATA);
            $std = json_encode($resp, JSON_PRETTY_PRINT);
            //$std = str_replace('@attributes', 'attributes', $std);
            //$std = json_decode($std);
            $ret[] = $std;
        }
        return $ret;
    }
}
