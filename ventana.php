<?php
$medidas = ["+2.00","+1.75","+1.50","+1.25","+1.00","+0.75","+0.50","+0.25","0.00","-0.25","-0.50","-0.75","-1.00","-1.25","-1.50","-1.75","-2.00","-2.25","-2.50","-2.75","-3.00","-3.25","-3.50","-3.75","-4.00","-4.25","-4.50","-4.75","-5.00","-5.25","-5.50","-5.75","-6.00"];
$esfera=2.25;
$cilindro = 0.25;

foreach ($medidas as $value) {
	echo $value."<br>";
}
/*for ($x = 0; $x <= 40; $x++) {

  $esfera=$esfera-0.25;
  $cilindro = $cilindro-0.25;
  


  echo "esfera ".$esfera."</br>";
  echo "cilindro ".$cilindro."</br>";

  if ($esfera==-6) {
  	echo "Fin";
  	break;
  }
}*/
$id ="'+0.25*-0.00";
$ident = substr($id, 1);
echo $ident."<br>";
$identificador=str_replace('*',"",$ident);
echo $identificador;
$variables = explode("-", $identificador);
var_dump($variables);
?>  
