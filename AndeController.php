<?php
    require_once 'AndeCore.php';

    class AndeController extends AndeCore {

        public function __construct($nis) 
        {
            parent::__construct($nis);
        }

        public function getNameFilePdf() 
        {
            echo !empty($this->fileName) ? $this->fileName: 'Problemas al recurperar el nombre';
        }

        public function renderInvoiceHtml() 
        {
            echo file_exists($this->fileName)? '<embed src="'.$this->fileName.'" type="application/pdf" width="100%" height="100%">': 'No se pudo renderizar el html';
        }

        public function renderPdfInHtml() 
        {
            $this->createFilePDF();
            $this->renderInvoiceHtml();
        }

        public function renderNameFilePdf() 
        {
            $this->createFilePDF();
            $this->renderInvoiceName();
        }

        public function hasDebt()
        {
            $header = $this->getHeader();
            if($header->error) echo $header->errorValList[0];exit;
            return $header->resultado->tieneDeuda;
        }

    }
