<?php

namespace NFePHP\Atende;

use DOMDocument;
use DOMElement;
use stdClass;

class Response
{
    /**
     * Convert Atende xml response to stdClass
     * @param string $xml
     * @return stdClass
     */
    public static function toStd($xml)
    {
        return json_decode(self::select($xml));
    }
    
    /**
     * Convert Atende xml response to array
     * @param string $xml
     * @return array
     */
    public static function toArray($xml)
    {
        return json_decode(self::select($xml), true);
    }
    
    /**
     * Convert Atende xml response to json string
     * @param string $xml
     * @return string
     */
    public static function toJson($xml)
    {
        return self::select($xml);
    }
    
    /**
     * Identify and convert xml
     * @param string $xml
     * @return string
     */
    protected static function select($xml)
    {
        $infolist = [
            'infoServidor',
            'infoDependente',
            'infoContribuicao',
            'infoContribuicaoAnalitica',
            'infoAfastamento',
            'infoTempoContribuicao'
        ];
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = false;
        $dom->loadXML($xml);
        foreach ($infolist as $item) {
            $node = null;
            $node = $dom->getElementsByTagName($item)->item(0);
            if (!empty($node)) {
                return self::render($node);
            }
        }
    }
    
    /**
     * Renderize DOMElement do json string
     * @param DOMElement $node
     * @return string
     */
    protected static function render(DOMElement $node)
    {
        $newdoc = new DOMDocument('1.0', 'utf-8');
        $newdoc->appendChild($newdoc->importNode($node, true));
        $xml = $newdoc->saveXML();
        $newdoc = null;
        $xml = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $xml);
        $xml = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $xml);
        $resp = simplexml_load_string($xml, null, LIBXML_NOCDATA);
        $json = json_encode($resp, JSON_PRETTY_PRINT);
        $json = str_replace('@attributes', 'attributes', $json);
        $std = json_decode($json);
        return str_replace('{}', '""', json_encode($std, JSON_PRETTY_PRINT));
    }
}
