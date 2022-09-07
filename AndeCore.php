<?php
    require_once 'AndeServices.php';

    class AndeCore {
        protected $fechaFacturacion;
        protected $fileName;
        protected $fileBlob;
        protected $nis;
        private $services;

        public function __construct($nis) 
        {
            $this->nis = $nis;
            $this->services = new AndeServices($nis, $fechaFacturacion);
        }

        public function getInvoices($quantity = 15) 
        {
            return $this->services->queryUltimasFacturas($quantity);
        }

        public function getLastInvoice() 
        {
            $response = $this->services->queryUltimasFacturas(1);
            if($response->error) return $response;
            $this->fechaFacturacion = $this->spanishDate($response->resultado->lista[0]->fechaFacturacion);
            $this->services->fechaFacturacion = $this->fechaFacturacion;
            return $response;
        }

        public function getHeader() 
        {
            return $this->services->querySituacionActual();
        }

        public function getHistorial() 
        {
            return $this->services->queryHistoricoConsumoMonto();
        }

        public function getInvoiceBlob() 
        {
            $response = $this->getLastInvoice();
            if(isset($response->error) && $response->error) return $response;
            $response = $this->services->queryfacturaPdf();
            $responseJSON = json_decode($response);
            if($responseJSON->error) {
                $response = $this->services->queryUltimaFacturaPendientePdf();
                $responseJSON = json_decode($response);
                if($responseJSON->error) {
                    return $responseJSON->mensaje;
                }
            }
            $this->fileBlob = $response;
        }

        public function createFilePDF() 
        {
            $response = $this->getInvoiceBlob();
            if(isset($response->error) && $response->error) return $response;
            $date = DateTime::createFromFormat("d/m/Y", $this->fechaFacturacion);
            $fileName = $this->nis.'_'.date('d-m-Y',$date->getTimestamp()).'.pdf';
            if(!file_exists($fileName)){
                $file = fopen($fileName, "w+");
                fputs($file, $this->fileBlob);
            }
            $this->fileName = $fileName;
        }
        
        public function spanishDate($date) 
        {
            return date('d/m/Y', strtotime(date('Y-m-d',strtotime($date))));
        }
    }