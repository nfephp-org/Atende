# Atende

**API PHP para integração com o [Sistema Aturial AtendeNet Padrão IPM](https://www.ipm.com.br/ipm-sistemas/atende-net/)**

*Atende* é um framework em PHP, que permite a integração de um aplicativo com os 
serviços dos webservices providos pelo Sistema AtendeNet, realizando a montagem 
das mensagens SOAP.

[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![License][ico-license]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

[![Issues][ico-issues]][link-issues]
[![Forks][ico-forks]][link-forks]
[![Stars][ico-stars]][link-stars]

## CONTEXTO
O serviço WFPAtuarialPadraolPM foi desenvolvido com o propósito específico de fornecer
informações referentes ao cadastro de Funcionários, Dependentes, Tempo de Contribuição
Anterior dos Funcionários e Folha de Pagamento do sistema Atende.Net. Portanto, as consultas
disponibilizadas pelo mesmo deverão ser avaliadas e pensadas em um contexto geral, para que as
informações geradas e recebidas pelo serviço sejam geradas e trabalhadas da melhor forma.

## OBJETIVO
O objetivo único deste serviço é disponibilizar informações referentes aos Funcionários do
sistema Atende.Net.

## INSTALAÇÃO

A API pode ser instalada por linha de comando com o composer

```
composer require nfephp-org/atende
```

Ou colocando como dependência diretamente no composer.json do seu aplicativo:

```json
    "require": {
        "nfephp-org/atende" : "^0.1"
    },
```

## DEPENDÊNCIAS

- PHP >= 5.6 (preferencialmente 7.0 ou maior)
- *php-curl* CURL module for PHP
- *php-xml* DOM, SimpleXML, WDDX, XML, and XSL module for PHP
- *php-json* JSON module for PHP
- *php-zlib* CORE DEFAULT
- *php-date* CORE DEFAULT

## USO

Para usar você pode ver os exemplos na pasta exemples.

O Atende.Net tem 6 processos possíveis, exemplificados abaixo:

1. [Lista Afastamentos](examples/testGetAfastamento.php)
2. [Lista Dependentes](examples/testGetDependentes.php)
3. [Lista Contribuições Analitica](examples/testGetContribuicaoAnalitica.php)
4. [Lista Servidores](examples/testGetServidor.php)
5. [Lista Contribuições](examples/testGetContribuicao.php)
6. [Lista Tempo de Contribuição](examples/testGetTempoContribuicao.php)


## CREDITOS

- Rodrigo Traleski <rodrigo@actuary.com.br>
- Luiz Eduardo Godoy Bueno <luizeduardogodoy@gmail.com>
- Roberto L. Machado <linux.rlm@gmail.com>

O desenvolvimento desse pacote somente foi possivel devido a contribuição e colaboração da 
[ACTUARY Ltda](http://www.actuary.com.br/v2/informatica/index.php) 

## LICENÇA

Este patote está diponibilizado sob LGPLv3, GPLv3 ou MIT License (MIT). Leia  [Arquivo de Licença](LICENSE.md) para maiores informações.

[ico-stars]: https://img.shields.io/github/stars/nfephp-org/atende.svg?style=flat-square
[ico-forks]: https://img.shields.io/github/forks/nfephp-org/atende.svg?style=flat-square
[ico-issues]: https://img.shields.io/github/issues/nfephp-org/atende.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/nfephp-org/Atende/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/nfephp-org/atende.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/nfephp-org/atende.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/nfephp-org/atende.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/nfephp-org/atende.svg?style=flat-square
[ico-license]: https://poser.pugx.org/nfephp-org/atende/license.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/nfephp-org/atende
[link-travis]: https://travis-ci.org/nfephp-org/atende
[link-scrutinizer]: https://scrutinizer-ci.com/g/nfephp-org/atende/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/nfephp-org/atende
[link-downloads]: https://packagist.org/packages/nfephp-org/atende
[link-author]: https://github.com/nfephp-org
[link-issues]: https://github.com/nfephp-org/atende/issues
[link-forks]: https://github.com/nfephp-org/atende/network
[link-stars]: https://github.com/nfephp-org/atende/stargazers
