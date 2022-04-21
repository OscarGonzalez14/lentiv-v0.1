<?php //ob_start();
//use Dompdf\Dompdf;

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
       html{
    margin-top: 5px;
    margin-left: 10px;
    margin-right:10px; 
    margin-bottom: 5px;
  }
   </style>
   </script>
  </head>

  <body>
   <table width="100%">
     <tr>
       <td>
         <div style="text-align: left; font-size: 10px;font-family: Helvetica, Arial, sans-serif;">
      <div id="qrbox">
        <div style="margin: 0px;">
          <span style="font-size: 15px"><b>LENTI</b></span><br>
          <span style="font-size: 12px; text-transform: uppercase;"><b><?php echo $paciente;?></span><br>
          <span style="font-size: 12px"><b><?php echo $optica;?></span>
        </div>
        <div><?php echo $code;?></div>         
          <div style="font-size:15px"><?php echo $codigo;?><br>
            <span style="font-size: 15px">lentitulaboratorio.com</span>
          </div>
      </div>
    </div>
       </td>
     
       <td>
         <div style="text-align: left; font-size: 10px;font-family: Helvetica, Arial, sans-serif;">
      <div id="qrbox">
        <div style="margin: 0px;">
          <span style="font-size: 15px"><b>LENTI</b></span><br>
          <span style="font-size: 12px"><b><?php echo $paciente;?></span><br>
          <span style="font-size: 12px"><b><?php echo $optica;?></span>
        </div>
        <div><?php echo $code;?></div>         
          <div style="font-size:15px"><?php echo $codigo;?><br>
            <span style="font-size: 15px">lentitulaboratorio.com</span>
          </div>
      </div>
    </div>
       </td>
     </tr>
   </table>
  <script>  
      window.print();
  </script> 

</body>
</html>
