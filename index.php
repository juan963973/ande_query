<?php
    require_once 'AndeController.php';

    $nis = '2585233';
    // $nis = '3212192';
    // $nis = '3212150';

    $ande = new AndeController($nis);
    $ande->renderPdfInHtml();            // Descarga el archivo pdf y retorna en un embed html
    // $ande->hasDebt();                    // Retorna boleano true, si tiene deuda
    // print_r($ande->getHeader());         // Recupera datos importantes de cabecera con varios detalles
    // print_r($ande->getLastInvoice());    // Consultar ultima factura, sin descargar archivo
    // print_r($ande->getInvoices(5));      // Consultar varias facturas, sin descargar archivo
    // $ande->getNameFilePdf();             // Descarga el archivo pdf y retorna el nombre del archivo
    // $ande->getHistorial();      // Retorna el historial la ANDE usa para graficar el consumo en los anios
