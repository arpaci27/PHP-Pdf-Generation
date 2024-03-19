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

$dompdf->setPaper('A4');

$html = file_get_contents('template.html');

// Assuming $html contains the HTML content with placeholders
$html = str_replace("{{ name }}", $name, $html); // Replace {{ name }} with the value of $name
$html = str_replace("{{ quantity }}", $quantity, $html); // Replace {{ quantity }} with the value of $quantity


$dompdf->load_html($html);
//$dompdf->load_html_file('template.html');



$dompdf->render();

$dompdf->add_info('Title', 'Omer'); 

$dompdf->stream('omer.pdf', ["Attachment" => 0]); //I need to install PHP GD library to make it shwo the image in the pdf