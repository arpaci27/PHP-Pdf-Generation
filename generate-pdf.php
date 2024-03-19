<?php



require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf;

$dompdf->load_html("Hello World");

$dompdf->render();

$dompdf->stream();