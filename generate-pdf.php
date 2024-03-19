<?php



require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$name = $_POST['name'];
$quantity = $_POST['quantity'];

$html = "<h1>Example</h1>";
$html.="Hello <em>$name</em>";   
$html.="<img src='example.png' width='200' height='200'>";
$html.="<p>Quantity: $quantity</p>";
$options = new Options();
$options->setChroot(__DIR__);
$dompdf = new Dompdf($options
);

$dompdf->load_html($html);

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->add_info('Title', 'Omer'); 

$dompdf->stream('omer.pdf', ["Attachment" => 0]); //I need to install PHP GD library to make it shwo the image in the pdf