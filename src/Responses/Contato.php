<?php

namespace NFePHP\Atende\Responses;

use DOMDocument;
use NFePHP\Atende\Responses\Base;

class Contato extends Base
{
    protected static $properties = ['tipo','descricao','preferencial'];
    
    public static function render(DOMDocument $dom)
    {
        $contatos = $node->getElementsByTagName('contato')->item(0);
        $itens = $contato->getElementsByTagName('item');
        foreach($itens as $item) {
            $std = new stdClass();
            self::getChilds($item, $std);
            $ret[] = $std;
        }
        return $ret;
    }
}
