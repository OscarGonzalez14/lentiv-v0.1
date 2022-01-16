<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once '../dompdf/autoload.inc.php';
require_once ('../config/conexion.php');
require_once ('../modelos/Reporteria.php');

$reporteria = new Reporteria();


///DETALLES DE ORDEN*
$datos_orden = $reporteria->get_datos_orden($_POST['codigo']);
$datos_rxfinal = $reporteria->get_orden_rxfinal($_POST["codigo"]);
$datos_alturas = $reporteria->get_alturas_orden($_POST["codigo"]);
$datos_aros = $reporteria->get_det_aros_orden($_POST["codigo"]);
$tratamientos = $reporteria->get_tratamientos_orden($_POST["codigo"]);
$items_trat = array();
$titulo = 'ORDEN DE PRODUCCIÓN';

for ($i=0; $i < count($tratamientos);$i++) {
 
  array_push($items_trat,$tratamientos[$i]['tratamiento']);  

} 
$tratamientos_lente = implode(', ',$items_trat);

//print_r($datos_alturas);exit();
foreach ($datos_orden as $v){
	$paciente = $v["paciente"];
	$tipo_lente = $v["tipo_lente"];
	$trat_orden = $v["trat_orden"];
	$codigo = $v["codigo"];
  $optica = $v["optica"];
  $sucursal = $v["sucursal"];
  $tipo_lente = $v["tipo_lente"];
  $trat_orden = $v["trat_orden"];
  $observaciones = $v["observaciones"];
}
foreach ($datos_rxfinal as $rx) {
  $odesferas = $rx["odesferas"];
  $odcindros = $rx["odcindros"];
  $odeje = $rx["odeje"];
  $odadicion = $rx["odadicion"];
  $odprisma = $rx["odprisma"];
  $oiesferas = $rx["oiesferas"];
  $oicindros = $rx["oicindros"];
  $oieje = $rx["oieje"];
  $oiadicion = $rx["oiadicion"];
  $oiprisma = $rx["oiprisma"];
}
foreach ($datos_alturas as $a) {
  $od_dist_pupilar = $a["od_dist_pupilar"];
  $od_altura_pupilar = $a["od_altura_pupilar"];
  $od_altura_oblea = $a["od_altura_oblea"];
  $oi_dist_pupilar = $a["oi_dist_pupilar"];
  $oi_altura_pupilar = $a["oi_altura_pupilar"];
  $oi_altura_oblea = $a["oi_altura_oblea"];
}
foreach ($datos_aros as $aros) {
  $marca = $aros["marca"];
  $modelo = $aros["modelo"];
  $color = $aros["color"];
  $diseno = $aros["diseno"];
}
foreach ($tratamientos as $tor) {
  $tratamiento = $tor["tratamiento"];
}
?>


<html>
<head>
<link rel="stylesheet" href="../estilos/styles.css">
<meta charset="utf-8">	
</head>
<body>
  <table width="100%" style="margin-top:20px;">
    <tr>
      <th colspan="10"><img src="../dist/img/lenti_logo.png" width="55" height="45"/></th>
      <th colspan="70" style="text-align: center;margin-top: 0px;color:#0088b6;font-size:14px;font-family: Helvetica, Arial, sans-serif;"><b>ORDEN DE PRODUCCIÓN</b></th>
      <th colspan="20"><strong>ORDEN</strong><br><strong style="color:red;">No.&nbsp;<span><?php echo $codigo; ?></strong></th>
    </tr>

  </table>
  <table class="clase_table" width="100%" style="text-align:center;margin-top:8px;text-transform: uppercase;">
      <tr class="cladse_table">
      <td colspan="50"><span><strong>PACIENTE: </strong></span><?php echo $paciente; ?></td>
      <td colspan="25" style="border-left:1px solid #0275d8 ;"><span><strong>OPTICA: </strong></span><?php echo $optica; ?></td>
      <td colspan="25" style="border-left:1px solid #0275d8 ;"><span><strong>SUCURSAL: </strong></span><?php echo $sucursal; ?></td>
    </tr> 
  </table>
  <table class="table3" width="100%" style="text-align:center;margin-top:15px;border-radius:5px;">
    <tr>
    <th colspan="50" style="background-color:#D8D8D8;"><span>ESPECIFICACIONES DE LENTE</span></th>
  </tr>
  <tr>
    <td colspan="13"><strong>LENTE</strong></td>
    <td colspan="13"><strong>MARCA</strong></td>
    <td colspan="24"><strong>TRATAMIENTOS</strong></td>
  </tr>
  <tr>
    <td colspan="13"><?php echo $tipo_lente; ?></td>
    <td colspan="13"><?php echo $trat_orden; ?></td>
    <td colspan="24"><?php echo $tratamientos_lente; ?></td>
  </tr>
  </table>
  <table width="100%" style="margin-top:15px">
  <tr>
    <td colspan="25" style="align-items:center; width: 100%;">
     <table class="table3" width="100%">
      <tr>
        <th colspan="100" style="background-color:#D8D8D8;"><span class="subt">GRADUACIÓN (RX FINAL)</span></th> 
      </tr>
       <tr>
         <th colspan="10">OJO</th>
         <th colspan="18">ESFERAS</th>
         <th colspan="18">CILINDROS</th>
         <th colspan="18">EJE</th>
         <th colspan="18">ADICIÓN</th>
         <th colspan="18">PRISMA</th>
       </tr>
       <tr>
         <td colspan="10"><strong>OD</strong></td>
         <td colspan="18"><?php echo $odesferas ?></td>
         <td colspan="18"><?php echo $odcindros ?></td>
         <td colspan="18"><?php echo $odeje ?></td>
         <td colspan="18"><?php echo $odadicion ?></td>
         <td colspan="18"><?php echo $odprisma ?></td>
       </tr>
       <tr>
         <td colspan="10"><strong>OI</strong></td>
         <td colspan="18"><?php echo $oiesferas ?></td>
         <td colspan="18"><?php echo $oicindros ?></td>
         <td colspan="18"><?php echo $oieje ?></td>
         <td colspan="18"><?php echo $oiadicion ?></td>
         <td colspan="18"><?php echo $oiprisma ?></td>
       </tr>
     </table>
    </td>
    <td colspan="25" style="align-items:center; width: 100%;">
      <table class="table3">
        <tr>
         <th colspan="70" style="background-color:#D8D8D8;"><span class="subt">MEDIDAS</span></th> 
        </tr>
       <tr>
         <th colspan="10">OJO</th>
         <th colspan="20">DIST. PUPILAR</th>
         <th colspan="20">ALT. PUPILAR</th>
         <th colspan="20">ALT. OBLEA</th>
       </tr>
       <tr>
         <td colspan="10"><strong>OD</strong></td>
         <td colspan="20"><?php echo $od_dist_pupilar?></td>
         <td colspan="20"><?php echo $od_altura_pupilar?></td>
         <td colspan="20"><?php echo $od_altura_oblea?></td>
       </tr>
       <tr>
         <td colspan="10"><strong>OI</strong></td>
         <td colspan="20"><?php echo $oi_dist_pupilar?></td>
         <td colspan="20"><?php echo $oi_altura_pupilar?></td>
         <td colspan="20"><?php echo $oi_altura_oblea?></td>
       </tr>
     </table>
    </td>
   </tr>
  </table>
  <table width="100%" class="table3" style="margin-top:15px;">
   <tr>
    <th colspan="50" style="background-color:#D8D8D8; margin-top: 15px;"><span>ESPECIFICACIONES DE ARO</span></th> 
   </tr>
   <tr>
    <td colspan="23"><strong>MARCA</strong></td>
    <td colspan="9"><strong>MODELO</strong></td>
    <td colspan="9"><strong>COLOR</strong></td>
    <td colspan="9"><strong>DISEÑO</strong></td>
   </tr>
   <tr>
    <td colspan="23"><?php echo $marca ?></td>
    <td colspan="9"><?php echo $modelo ?></td>
    <td colspan="9"><?php echo $color ?></td>
    <td colspan="9"><?php echo $diseno ?></td>
   </tr>
  </table>
  <table width="100%" class="table3" style="margin-top:15px;">
   <tr>
    <th colspan="50" style="text-align:left;margin-top:15px;padding:5px;"><span> OBSERVACIONES: <span style="color:#0431B4"><?php echo $observaciones;?></span></th> 
   </tr> 
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