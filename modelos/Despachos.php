<?php
require_once("../config/conexion.php");
  
class Despachos extends Conectar{

    public function getCorrelativoDespacho(){
      $conectar= parent::conexion();
      $sql= "select n_despacho from despacho order by id_despacho DESC limit 1;";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      return $sql->fetchColumn();
    }

    private function verificaExisteCorrelativo($correlativo){
      $conectar=parent::conexion();
      parent::set_names();
      $sql = "select n_despacho from despacho where correlativo_ingreso=?;";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1,$correlativo);
      $sql->execute();
      return $sql->rowCount();        
    }    
     
	public function registrarDespachoLab(){

		$conectar=parent::conexion();
    	parent::set_names();
    
        date_default_timezone_set('America/El_Salvador');
        $fecha = date("Y-m-d");
        $hora = date( "H:i:s");
        $mensajero = "---";
		$correlativo = $this->getCorrelativoDespacho();
		$corr = substr($correlativo,4,20);
        $correlativo_ing = "DSP-".($corr+1);

        $comprobar_correlativo = $this->verificaExisteCorrelativo($correlativo_ing);
 
        $itemsDespacho = array();
        $itemsDespacho = json_decode($_POST["arrayItemsAccion"]);
        $n_items = count($itemsDespacho);

        if($comprobar_correlativo==0){
        	$sql = "insert into despacho values(null,?,?,?,?,?,?)";
        	$sql = $conectar->prepare($sql);
		    $sql->bindValue(1, $correlativo_ing);
		    $sql->bindValue(2, $mensajero);
		    $sql->bindValue(3, $fecha);
		    $sql->bindValue(4, $hora);
		    $sql->bindValue(5, $n_items);
		    $sql->bindValue(6, $_POST["id_usuario"]);
		    $sql->execute();
        }

    	
		
	}
}                                                                                                                                                                                                                                                                                                   