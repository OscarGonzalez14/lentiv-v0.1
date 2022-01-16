<?php

require_once("../config/conexion.php");
//require_once('../vistas/side_bar.php');
class Pruebas extends Conectar{

	public function get_data_ar_green_term(){
		$conectar=parent::conexion();
    parent::set_names();

    $sql="select * from lente_terminado;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}

  public function permisos(){
    $conectar=parent::conexion();
    parent::set_names();

    $sql="select * from usuario_permiso where id_usuario=1;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
<html>
  <body>
    <?php
     $prueba = new Pruebas();
     $data = $prueba->permisos();
     $valores=array();
    foreach($data as $row){
        $valores[]= $row["id_permiso"];
    }

    //in_array(1,$valores)? echo "True";: echo "False";
    ?>
  </body>
</html>