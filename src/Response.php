<?php


namespace NFePHP\Atende;

/**
 * Não use, codigo em desenvolvimento !!
 */

use DOMDocument;
use Actuary\Atende\Responses\Servidor;

class Response
{
    public static function toStd($action, $xml)
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = false;
        $dom->loadXML($xml);
        switch ($action) {
            case 'getServidor':
                return self::render($dom, 'item', 53);
                break;
            case 'getDependentes':
                return self::render($dom, 'item', 53);
                break;
            case 'getContribuicao':
                break;
            case 'getContribuicaoAnalitica':
                break;
            case 'getAfastamento':
                break;
            case 'getTempoContribuicao':
                break;
        }
    }
    
    public static function render(DOMDocument $dom, $nodename, $min = 0)
    {
        $ret = [];
        $itens = $dom->getElementsByTagName($nodename);
        foreach ($itens as $item) {
            if ($item->childNodes->length >= $min) {
                $newdoc = new DOMDocument('1.0', 'utf-8');
                $newdoc->appendChild($newdoc->importNode($item, true));
                $xml = $newdoc->saveXML();
                $newdoc = null;
                $xml = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $xml);
                $xml = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $xml);
                $resp = simplexml_load_string($xml, null, LIBXML_NOCDATA);
                $std = json_encode($resp, JSON_PRETTY_PRINT);
                //$std = str_replace('@attributes', 'attributes', $std);
                $std = json_decode($std);
                $ret[] = $std;
            }
            if (count($ret) > 9) {
                break;
            }
        }
        return $ret;
    }
}
