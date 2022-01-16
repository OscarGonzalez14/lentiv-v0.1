<?php
require_once("../config/conexion.php");
  
class Tallado extends Conectar{

        public function getCorrelativoIngresoT(){
          $conectar= parent::conexion();
          $sql= "select correlativo_ingreso from ingreso_tallado order by id_ingreso DESC limit 1;";
          $sql=$conectar->prepare($sql);
          $sql->execute();
          return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        /*-----Verificar si existe correlativo de Ingreso -----*/
        public function verificaExisteCorrelativo($correlativo){
          $conectar=parent::conexion();
          parent::set_names();
          $sql = "select correlativo_ingreso from ingreso_tallado where correlativo_ingreso=?;";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1,$correlativo);
          $sql->execute();
          return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        /*-----Ingresos a tallado ----*/
	public function registrarIngresoTallado(){
	$conectar=parent::conexion();
        parent::set_names();

        $id_usuario = $_POST["id_usuario"];
        $correlativo_ing = $_POST["correlativo_ing"];
        $itemsIngresoTallado = array();
        $itemsIngresoTallado = json_decode($_POST["arrayItemsTallado"]);
        date_default_timezone_set('America/El_Salvador'); 
        $fecha = date("Y-m-d");
        	$hora = date( "H:i:s");
         
        $sql3 = "insert ingreso_tallado values(null,?,?,?,?);";
            $sql3 = $conectar->prepare($sql3);
            $sql3->bindValue(1, $correlativo_ing);
            $sql3->bindValue(2, $fecha);
            $sql3->bindValue(3, $hora);
            $sql3->bindValue(4, $id_usuario);
            $sql3->execute();
           
        foreach ($itemsIngresoTallado as $key => $value) {
            $n_orden = $value->n_orden;

            $sql4 = "insert into detalle_ingresos_tallado values(null,?,?);";
            $sql4 = $conectar->prepare($sql4);
            $sql4->bindValue(1, $correlativo_ing);
            $sql4->bindValue(2, $n_orden);
            $sql4->execute();

            $accion = "Ingreso a Tallado";
            $sql5 = "insert into acciones_orden values(null,?,?,?,?,?);";
            $sql5 = $conectar->prepare($sql5);
            $sql5->bindValue(1, $n_orden);
            $sql5->bindValue(2, $fecha." ".$hora);
            $sql5->bindValue(3, $accion);
            $sql5->bindValue(4, "");
            $sql5->bindValue(5, $id_usuario);
            $sql5->execute();	    

        }
        }/*----Fin registrar ingresos tallado */

        ###############  LISTAR INGRESOS PARA DATATABLES  ##########
        public function listarIngresosTallado(){
            $conectar=parent::conexion();
            parent::set_names();

            $sql = "select d.id_ingreso,i.correlativo_ingreso,i.fecha,i.hora,d.codigo_orden,u.usuario,u.codigo_emp, o.codigo,o.tipo_lente,o.contenedor,o.paciente,op.nombre from ingreso_tallado as i inner join detalle_ingresos_tallado as d on i.correlativo_ingreso=d.correlativo_ingreso inner JOIN usuarios as u ON i.id_usuario=u.id_usuario INNER join orden as o on o.codigo=d.codigo_orden inner join optica as op on o.id_optica=op.id_optica GROUP by d.id_ingreso order by d.id_ingreso DESC;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        }
   
}/*--------- Fin de la clase ---------*/