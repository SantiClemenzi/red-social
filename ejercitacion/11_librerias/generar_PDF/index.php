<?php
require_once '../vendor/autoload.php';
// require __DIR__.'/vendor/autoload.php';


use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html = '<h1>Hola mundo!!</h1>';
$html .= '<p>Este es el documento PDF generado por la libreria.</p>';
$html2pdf->writeHTML($html);
$html2pdf->output('pdf_generado.pdf');