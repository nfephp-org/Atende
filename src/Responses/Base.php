<?php

namespace NFePHP\Atende\Responses;

use DOMDocument;
use DOMElement;
use stdClass;

class Base
{
    protected static function getChilds(DOMElement $node, stdClass &$std, $properties = [])
    {
        foreach ($properties as $p) {
            $std->$p = $node->getElementsByTagName($p)->item(0)->nodeValue;
        }
    }
}
