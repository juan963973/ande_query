<?php
    require_once 'CurlRequest.php';

    class AndeServices {
        private     $url    = "https://prod1.ande.gov.py:8581/sigaWs/api/open/v4/suministro";
        private     $origin = 'https://www.ande.gov.py';
        public      $fechaFacturacion;
        protected   $nis;
        private     $cURL;

        public function __construct($nis, $fechaFacturacion) {
            $this->nis = $nis; 
            $this->fechaFacturacion = $fechaFacturacion; 
            $this->cURL = new CurlRequest();
        }

        public function queryUltimasFacturas($quantity = 1)
        {
            $params = ['url' => "$this->url/ultimasFacturas", 'request' => "kwfxtoken=&nis=$this->nis&cantidad=$quantity"];
            $response = json_decode($this->cURL::method('POST',$params, $this->origin));
            if($response->error) return $response;
            return $response;
        }

        public function queryfacturaPdf() 
        {
            $params = ['url' => "$this->url/facturaPdf?nro_nis=$this->nis&sec_nis=1&sec_rec=0&f_fact=$this->fechaFacturacion"];
            return $this->cURL::method('GET',$params, $this->origin);
        }

        public function queryUltimaFacturaPendientePdf() 
        {
            $params = ['url' => "$this->url/ultimaFacturaPendientePdf?nis=$this->nis"];
            return $this->cURL::method('GET',$params, $this->origin);
        }

        public function querySituacionActual()
        {
            $params = ['url' => "$this->url/situacionActual", 'request' => "&nis=$this->nis"];
            $response = json_decode($this->cURL::method('POST',$params, $this->origin));
            if($response->error) echo $response->errorValList[0];exit;
            return $respose;
        }

        public function queryHistoricoConsumoMonto()
        {
            $params = ['url' => "$this->url/historicoConsumoMonto", 'request' => "&nis=$this->nis"];
            $response = json_decode($this->cURL::method('POST',$params, $this->origin));
            if($response->error) echo $response->errorValList[0];exit;
            return $respose;
        }
        
    }