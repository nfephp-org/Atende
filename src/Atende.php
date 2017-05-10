<?php

namespace NFePHP\Atende;

use Exception;
use RuntimeException;

class Atende
{
    /**
     * @var string
     */
    protected $user;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var int
     */
    protected $tpAmb = 2;
    /**
     * @var string
     */
    protected $soaperror;
    /**
     * @var string
     */
    protected $soapinfo;
    /**
     * @var string
     */
    public $url = [
        1 => "https://{city}.atende.net/atende.php?pg=services"
            . "&service=WFPAtuarialPadraoIPM&cidade=padrao",
        2 => "https://qualidadeatendenet56.ipm.com.br/rh04/atende.php"
            . "?pg=services&service=WFPAtuarialPadraoIPM&cidade={city}"
    ];
    /**
     * @var string
     */
    public $cidade = 'paranagua';
    /**
     * @var int
     */
    public $codcidade = 3037;
    /**
     * @var int
     */
    public $soaptimeout = 10;
    /**
     * @var bool
     */
    public $debugmode = false;
    
    /**
     * Constructor
     * @param string $user
     * @param string $password
     * @param string $cidade
     * @param int $codcidade
     */
    public function __construct($user, $password, $cidade, $codcidade)
    {
        $this->user = trim($user);
        $this->password = trim($password);
        $this->cidade = strtolower(trim($cidade));
        $this->codcidade = $codcidade;
        if (empty($this->user) || empty($this->password)) {
            throw new RuntimeException("A identificação do usuário e a "
                . "senha são obrigatórios.");
        }
    }
    
    /**
     * Set environment 2 to tests and 1 to production
     * @param int $tpAmb
     * @return int
     */
    public function setAmbiente($tpAmb = null)
    {
        if (!empty($tpAmb) && ($tpAmb == 1 || $tpAmb == 2)) {
            $this->tpAmb = $tpAmb;
        }
        return $this->tpAmb;
    }
    
    /**
     * Set debugmod
     * When debugmod = true, files with soap content will be saved for analises
     * @param bool $flag
     * @return void
     */
    public function setDebugMode($flag = true)
    {
        if (!empty($flag)) {
            $this->debugmode = $flag;
        }
        return $this->debugmode;
    }
    
    /**
     * Set soap timeout parameter in seconds
     * @param int $sec
     * @return void
     */
    public function setSoapTimeOut($sec = 10)
    {
        if (!empty($sec)) {
            $this->soaptimeout = $sec;
        }
        return $this->soaptimeout;
    }
    
    /**
     * Consulta Dados dos Afastamentos do Funcionário (getAfastamento)
     * Retorna os dados dos afastamentos de um ou mais funcionários
     * cadastrados no módulo da Folha de Pagamento do sistema Atende.Net.
     *
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param string $tipo
     * @param int $codigoRegime
     */
    public function getAfastamento(
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $action = "getAfastamento";
        $message = $this->build(
            $action,
            $anomes,
            $pagina,
            $cpf,
            $numeroMatricula,
            $tipo,
            $codigoRegime
        );
        $response = $this->send($action, $message);
        return $response;
    }
    
    /**
     * Consulta Dados das Bases de Contribuição (getContribuicao)
     * Retorna os dados das bases de pagamento de um ou mais funcionários
     * cadastrados no módulo da Folha de Pagamento do sistema Atende.Net
     *
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param string $tipo
     * @param int $codigoRegime
     */
    public function getContribuicao(
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $action = "getContribuicao";
        $message = $this->build(
            $action,
            $anomes,
            $pagina,
            $cpf,
            $numeroMatricula,
            $tipo,
            $codigoRegime
        );
        $response = $this->send($action, $message);
        return $response;
    }
    
    /**
     * Consulta Dados Pagamentos (getContribuicaoAnalitica)
     * Retorna os dados das folhas de pagamento de um ou mais funcionários
     * cadastrados no módulo da Folha de Pagamento do sistema Atende.Net
     * especificando verbas, referências e valores.
     *
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param string $tipo
     * @param int $codigoRegime
     */
    public function getContribuicaoAnalitica(
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $action = "getContribuicaoAnalitica";
        $message = $this->build(
            $action,
            $anomes,
            $pagina,
            $cpf,
            $numeroMatricula,
            $tipo,
            $codigoRegime
        );
        $response = $this->send($action, $message);
        return $response;
    }
    
    /**
     * Dados dos Dependentes do Funcionário (getDependentes)
     * Retorna os dados dos dependentes dos funcionários e do relacionamento
     * de dependência no sistema Atende.Net.
     *
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param string $tipo
     * @param int $codigoRegime
     */
    public function getDependentes(
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $action = "getDependentes";
        $message = $this->build(
            $action,
            $anomes,
            $pagina,
            $cpf,
            $numeroMatricula,
            $tipo,
            $codigoRegime
        );
        $response = $this->send($action, $message);
        return $response;
    }
    
    /**
     * Consulta Dados de Funcionário (getServidor)
     * Retorna os dados cadastrais de um ou mais funcionários do módulo
     * da Folha de Pagamento do sistema Atende.Net. Se o funcionário for
     * aposentado ou pensionista trará informações do tipo de aposentadoria ou
     * tipo de pensão. Caso o funcionário pensionista seja responsável ou
     * dependente de um funcionário falecido no relacionamento
     * Funcionário x Pensão do tipo "Por Morte" trará também os dados do
     * funcionário falecido.
     *
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param string $tipo
     * @param int $codigoRegime
     */
    public function getServidor(
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $action = "getServidor";
        $message = $this->build(
            $action,
            $anomes,
            $pagina,
            $cpf,
            $numeroMatricula,
            $tipo,
            $codigoRegime
        );
        $response = $this->send($action, $message);
        return $response;
    }
    
    /**
     * Consulta Dados Tempo de Contribuição do Funcionário
     * (getTempoContribuicao)
     * Retorna os dados dos tempos de contribuição anteriores dos funcionários
     * cadastrados no sistema Atende.Net
     *
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param string $tipo
     * @param int $codigoRegime
     */
    public function getTempoContribuicao(
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $action = "getTempoContribuicao";
        $message = $this->build(
            $action,
            $anomes,
            $pagina,
            $cpf,
            $numeroMatricula,
            $tipo,
            $codigoRegime
        );
        $response = $this->send($action, $message);
        return $response;
    }
    
    /**
     * Build message content
     *
     * @param string $action (OBRIGATÓRIO)
     * @param int $anomes (OBRIGATÓRIO) ex. 201612
     * @param int $pagina
     * @param string $cpf
     * @param string $numeroMatricula
     * @param int $tipo
     * @param int $codigoRegime
     * @return string
     */
    protected function build(
        $action,
        $anomes,
        $pagina = null,
        $cpf = null,
        $numeroMatricula = null,
        $tipo = null,
        $codigoRegime = null
    ) {
        $message = "<net:$action "
        . "soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">"
        . "<parametro xsi:type=\"net:ParametrosAvaliacaoAtuarial\">"
        . "<codigoCliente xsi:type=\"xsd:int\">$this->codcidade</codigoCliente>"
        . "<mesAno xsi:type=\"xsd:int\">$anomes</mesAno>";
        if (!empty($pagina)) {
            $message .= "<pagina xsi:type=\"xsd:int\">$pagina</pagina>";
        }
        if (!empty($cpf)) {
            $message .= "<cpf xsi:type=\"xsd:string\">$cpf</cpf>";
        }
        if (!empty($numeroMatricula)) {
            $message .= "<numeroMatricula "
            . "xsi:type=\"xsd:string\">$numeroMatricula</numeroMatricula>";
        }
        if (!empty($tipo)) {
            $message .= "<tipo xsi:type=\"xsd:int\">$tipo</tipo>";
        }
        if (!empty($codigoRegime)) {
            $message .= "<codigoRegime "
            . "xsi:type=\"xsd:int\">$codigoRegime</codigoRegime>";
        }
        $message .= "</parametro></net:$action>";
        return $message;
    }

    /**
     * Send SOAP message, and get response from webservice
     * @param string $action
     * @param string $message
     * @return string
     * @throws \RuntimeException
     */
    protected function send($action, $message)
    {
        $envelope = "<soapenv:Envelope "
        . "xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" "
        . "xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" "
        . "xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" "
        . "xmlns:net=\"net.atende\">"
        . "<soapenv:Header/>"
        . "<soapenv:Body>";
        $envelope .= $message . "</soapenv:Body></soapenv:Envelope>";
        
        $contentLength = strlen($envelope);
        $headers = [
            'User-Agent: PHP-SOAP',
            'Accept-Encoding: gzip,deflate',
            'Content-Type: text/xml;charset=UTF-8',
            "SOAPAction: \"net.atende#$action\"",
            "Content-Length: $contentLength",
            'Expect: 100-continue',
            'Connection: Keep-Alive'
        ];
        
        $txtheaders = implode("\n", $headers);
        $url = $this->url[$this->tpAmb];
        $url = str_replace("{city}", $this->cidade, $url);

        try {
            $oCurl = curl_init();
            curl_setopt($oCurl, CURLOPT_URL, $url);
            curl_setopt($oCurl, CURLOPT_CONNECTTIMEOUT, $this->soaptimeout);
            curl_setopt($oCurl, CURLOPT_TIMEOUT, $this->soaptimeout + 20);
            //dont use security check
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($oCurl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($oCurl, CURLOPT_FAILONERROR, 0);
            curl_setopt($oCurl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($oCurl, CURLOPT_USERPWD, $this->user.":".$this->password);
            curl_setopt($oCurl, CURLOPT_POST, 1);
            curl_setopt($oCurl, CURLOPT_POSTFIELDS, $envelope);
            curl_setopt($oCurl, CURLOPT_HEADER, 1);
            curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($oCurl, CURLOPT_VERBOSE, 1);
            curl_setopt($oCurl, CURLOPT_CERTINFO, 1);
            
            $response = curl_exec($oCurl);
            
            $this->soaperror = curl_error($oCurl);
            $this->soapinfo = curl_getinfo($oCurl);
            
            $headsize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
            $httpcode = curl_getinfo($oCurl, CURLINFO_HTTP_CODE);
            $bodysize = curl_getinfo($oCurl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
            $bodyType = curl_getinfo($oCurl, CURLINFO_CONTENT_TYPE);
            
            curl_close($oCurl);
            
            $responseHead = substr($response, 0, $headsize);
            $responseBody = substr($response, $headsize);
            if (substr($response, -3) !== substr($responseBody, -3)) {
                throw new \RuntimeException(
                    'A terminação dos dados compactados está diferente! Não foi possivel extrair os dados.'
                );
            }
            $marker = substr($responseBody, 0, 3);
            //identify compress body in gzip deflate
            if ($marker === chr(0x1F).chr(0x8B).chr(0x08)) {
                $responseBody = gzdecode($responseBody);
            }
            $this->saveDebugFiles(
                $action,
                $txtheaders . "\n" . $envelope,
                $responseHead . "\n" . $responseBody,
                $this->debugmode
            );
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
        if ($this->soaperror != '') {
            throw new \RuntimeException($this->soaperror);
        }
        if ($httpcode != 200) {
            throw new \RuntimeException($responseHead . '\n' . $responseBody);
        }
        return $responseBody;
    }
    
    /**
     * Save request envelope and response for debug reasons
     * @param string $action
     * @param string $request
     * @param string $response
     * @return void
     */
    protected function saveDebugFiles($action, $request, $response, $flag = false)
    {
        if (!$flag) {
            return;
        }
        $tempdir = sys_get_temp_dir()
            . DIRECTORY_SEPARATOR
            . 'soap'
            . DIRECTORY_SEPARATOR;
        if (! is_dir($tempdir)) {
            mkdir($tempdir, 0777);
        }
        $num = date('mdHis');
        file_put_contents($tempdir . "req_" . $action . "_" . $num . ".txt", $request);
        file_put_contents($tempdir . "res_" . $action . "_" . $num . ".txt", $response);
    }
}
