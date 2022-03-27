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

          ///////////// RECORRER E INSERTAR DETALLE DEL DESPACHO ///////////////
          foreach ($itemsDespacho as $key => $value) {

            $n_orden = $value->n_orden;
            $optica = $value->optica;
            $sucursal = $value->sucursal;

            $sql2 = "insert into detalle_despacho values(null,?,?,?,?);";
            $sql2 = $conectar->prepare($sql2);
            $sql2->bindValue(1, $correlativo_ing);
            $sql2->bindValue(2, $n_orden);
            $sql2->bindValue(3, $optica);
            $sql2->bindValue(4, $sucursal);
            $sql2->execute();

            $accion = "Despacho de Laboratorio";
            $sql3 = "insert into acciones_orden values(null,?,?,?,?,?);";
            $sql3 = $conectar->prepare($sql3);
            $sql3->bindValue(1, $n_orden);
            $sql3->bindValue(2, $fecha." ".$hora);
            $sql3->bindValue(3, $accion);
            $sql3->bindValue(4, "");
            $sql3->bindValue(5, $_POST["id_usuario"]);
            $sql3->execute();

            $sql4 = "update orden set estado = 'dsp' where codigo=?;";
            $sql4 = $conectar->prepare($sql4);
            $sql4->bindValue(1, $n_orden);
            $sql4->execute();

          }

          if ($sql->rowCount() > 0 and $sql2->rowCount() > 0 and $sql3->rowCount() > 0 and $sql4->rowCount() > 0){
            echo $_POST["tipo_accion"];
          }else{
            echo "Error";
          }   


        }/********fin comprobar correlativo ***********/   	
		
	}/**** FIN METODO REFISTRAR DESPACHO ***/

  public function getDespachos(){
    $conectar=parent::conexion();
    parent::set_names();

    $sql = "select d.id_despacho,d.n_despacho,d.fecha,d.hora,d.mensajero,d.cant_ordenes,u.codigo_emp,u.usuario from despacho as d inner join usuarios as u on d.id_usuario=u.id_usuario;";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

  public function getDetalleDespacho($n_despacho){

    $conectar=parent::conexion();
    parent::set_names();

    $sql = "select o.codigo,o.paciente,d.id_detalle_despacho,d.cod_orden,d.optica,d.sucursal from orden as o INNER join detalle_despacho as d on o.codigo=d.cod_orden where d.n_despacho=? order by d.optica DESC;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1,$n_despacho);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }


}###############  FIN DE LA CLASE ############                                                                                                                                                                                                                                                                                                   