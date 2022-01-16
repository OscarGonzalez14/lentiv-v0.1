<?php ob_start();
use Dompdf\Dompdf;
//use Dompdf\Options;

require_once '../dompdf/autoload.inc.php';
require_once '../modelos/Reporteria.php';
$reportes = new Reporteria();
$paciente = $_POST["paciente"];
$id_optica = $_POST["id_optica"];
$id_sucursal = $_POST["id_sucursal"];
$codigo = $_POST["codigo"];//$_POST["codigoOrden"];
date_default_timezone_set('America/El_Salvador'); 
$hoy = date("d-m-Y H:i:s");

require "vendor/autoload.php";
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($codigo, $Bar::TYPE_CODE_128,'2','50');

$optica_act = $reportes->get_optica_barcode($id_optica,$id_sucursal);

foreach ($optica_act as $key) {
  $optica = $key["nombre"]."-".$key["direccion"];
}
?>
<html lang="en" dir="ltr">
  <head>
   <style>
     @page { margin-top: 5px;margin-left: 5px}
   </style>
   <script>
     function imprimir() {
        window.print();
    }
   </script>
  </head>

  <body onload="imprimir();">

    <div style="text-align: left; font-size: 10px;font-family: Helvetica, Arial, sans-serif;">
      <div id="qrbox">
        <div style="margin: 0px;">
          <span style="font-size: 18px"><b>LENTI</b></span><br>
          <span style="font-size: 15px"><b><?php echo $paciente;?></span><br>
          <span style="font-size: 15px"><b><?php echo $optica;?></span>
        </div>
        <div><?php echo $code;?></div>         
          <div style="font-size:18px"><?php echo $codigo;?><br>
        <span style="font-size: 18px">lentitulaboratorio.com</span>
        </div>
      </div>
  </div>

  <!--<div style="page-break-after:always;"></div>
  
  <div style="text-align: left; font-size: 10px;font-family: Helvetica, Arial, sans-serif;">
      <div id="qrbox">
        <div style="margin: 0px;">
        <span style="font-size: 18px"><b>LENTI</b></span><br>
        <span style="font-size: 15px"><b><?php// echo $paciente;?></span><br>
        <span style="font-size: 15px"><b><?php //echo $optica;?></span>
        </div>
        <div><?php //echo $code;?></div>
         
        <div style="font-size:18px"><?php// echo $codigo;?><br>
        <span style="font-size: 18px">lentitulaboratorio.com</span>
        </div>
      </div>
    </div>-->


</body>
</html>
<?php

$salida_html = ob_get_contents();
//$user=$_SESSION["id_usuario"];
ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($salida_html);
$dompdf->setPaper('tabloid', 'landscape');
// (Optional) Setup the paper size and orientation
$dompdf->setPaper(array(0,0,220,210));
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
//$dompdf->stream();
$dompdf->stream('document', array('Attachment'=>'0'));
?>