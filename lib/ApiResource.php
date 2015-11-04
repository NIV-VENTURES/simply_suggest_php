<?php

namespace SimplySuggest;

class ApiResource
{
    /**
     * @var resource
     */
    protected $curlClient;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @return resource
     */
    public function getCurlClient()
    {
        return $this->curlClient;
    }

    /**
     * @param resource $curlClient
     */
    public function setCurlClient($curlClient)
    {
        $this->curlClient = $curlClient;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function initCurlClient($method = "GET")
    {
        $curl = curl_init();
        $url  = $this->buildUrl();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array("cache-control: no-cache")
        ));

        $this->setCurlClient($curl);
    }

    public function executeRequest()
    {
        $curl = $this->getCurlClient();

        $response = curl_exec($curl);
        $err = curl_error($curl);
        var_dump($err);

        curl_close($curl);

        return json_decode($response);
    }

    protected function buildUrl()
    {
        $url = "https://v1.simply-suggest.dev/";
        $url .= ltrim($this->getEndpoint() . ".json?secretKey=" . SimplySuggest::getInstance()->getPrivateKey(), "/");

        return $url;
    }
}