<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once '../dompdf/autoload.inc.php';
require_once ('../config/conexion.php');
require_once ('../modelos/Despachos.php');
date_default_timezone_set('America/El_Salvador'); 
$hoy = date("d-m-Y");
$dateTime= date("d-m-Y H:i:s");
$despacho = new Despachos();
$data = $despacho->getDetalleDespacho($_POST["n_despacho"]);

?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=, initial-scale=1.0">
	<title>.::Detalle despacho::.</title>
   <link rel="stylesheet" href="../estilos/styles.css">
	<style>

	body{
    font-family: Helvetica, Arial, sans-serif;
    font-size: 12px;
  }

  html{
    margin-top: 5px;
    margin-left: 10px;
    margin-right:10px; 
    margin-bottom: 0px;
  }
 
.input-report{
    font-family: Helvetica, Arial, sans-serif;
    border: none;
    border-bottom: 2.2px dotted #C8C8C8;
    text-align: left;
    background-color: transparent;
    font-size: 13px;
    width: 100%;
    padding: 10px
  }	
	</style>

</head>

<body>

<html>

<table style="width: 100%;margin-top:2px" width="100%">

<tr>
<td width="25%" style="width: 10%;margin:0px">
	<img src='../dist/img/lenti_logo.png' width="90" height="70"/></td>
</td>
	
<td width="50%" style="width: 75%;margin:0px">
<table style="width:100%">
  <tr>
    <td  style="text-align: center;margin-top: 0px;font-size:15px;font-family: Helvetica, Arial, sans-serif;"><b>ORDEN DE ENVIOS</b></td>
</tr>
</table><!--fin segunda tabla-->
</td>
<td width="25%" style="width: 30%;margin:0px">
<table width="100%">
  <tr>
    <td style="text-align:right; font-size:12px;color: #008C45"><strong>ORDEN</strong></td>
  </tr>
  <tr>
    <td style="color:red;text-align:right; font-size:12px;color: #CD212A"><strong >No.&nbsp;<span><?php echo $_POST["n_despacho"]; ?></span></strong></td>
  </tr>
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna-->
</tr>
</table>
<br>
<table width="100%" style="width: 100%;margin-top: 0px !important">
  <tr>
    <td colspan="25" style="width: 25%"><input type="text" class="input-report" value="Fecha envio: <?php echo $hoy;?>"></td>
    <td colspan="38" style="width: 38%;text-align: left;"><input type="text" class="input-report" value="Enviado por: "></td>
    <td colspan="37" style="width: 37%;text-align: left;"><input type="text" class="input-report" value="Mensajero: "></td>    
  </tr>
  <tr>
    <td colspan="25" style="width: 25%"><input type="text" class="input-report" value="Cant. ordenes: <?php echo count($data)?>"></td>  
    <td colspan="38" style="width: 37%;text-align: left;"><input type="text" class="input-report" value="Firma-Sello: "></td>
    <td colspan="37" style="width: 38%;text-align: left;"><input type="text" class="input-report" value="Recibido por: "></td>    
  </tr>
</table>
<br>  
<table width="100%" id="tabla_reportes" data-order='[[ 0, "desc" ]]' style="margin: 3px">        
 <tr>
   <th>#</th>
   <th>Cod. orden</th>
   <th>Paciente</th>
   <th>Optica</th>
   <th>Sucursal</th>
 </tr>
 <tbody class="style_th">
 <?php
  $i=1;
  foreach ($data as $value) { ?>
    <tr> 
     <td><?php echo $i;?></td>
     <td><?php echo $value["cod_orden"]; ?></td>
     <td><?php echo $value["paciente"]; ?></td>
     <td><?php echo $value["optica"]; ?></td>
     <td><?php echo $value["sucursal"]; ?></td>
    </tr> 

  <?php $i++; } ?>  
 </tbody>
</table>
</body>
</html>

<?php
$salida_html = ob_get_contents();
ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($salida_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('document', array('Attachment'=>'0'));
?>