<?php

require_once("../config/conexion.php");
class Productos extends Conectar{
    
    public function verificarExisteCodigo($codigo){
        $conectar=parent::conexion();
        parent::set_names();
        $sql = "select*from codigos_lentes where codigo=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$codigo);
        $sql->execute();
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        if(is_array($resultado)==true and count($resultado)>0){
            foreach ($resultado as $k) {
                $tipo_lente = $k["tipo_lente"];
            }

        if ($tipo_lente=="Terminado") {            
            $query = "select CONCAT('Codigo actual ya ha sido asignado en terminados. Tabla id: ', id_tabla_term,' Esf.: ',esfera,' Cil.: ',cilindro) as data from stock_terminados";
        }elseif($tipo_lente == "Base"){
            $query = "select CONCAT('Codigo actual ya ha sido asignado en bases. Tabla: ', diseno,' base: ',base) AS data from stock_bases";
        }         

        $sql = "".$query." where codigo=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$codigo);
        $sql->execute();
        $resultado_tabla = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado_tabla as $t) {
            $data = $t['data'];
        }
            echo json_encode($data);
        }else{
            echo json_encode("Okcode");
        }
    }
    
    
	public function get_data_ar_green_term(){
	$conectar=parent::conexion();
    parent::set_names();

    $sql="select * from lente_terminado;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}

  public function  get_data_item_ingreso($id_lente){
    $conectar=parent::conexion();
    parent::set_names();
    
    $sql="select*from lente_terminado where id_terminado=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_lente);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

  }
 
  public function update_stock_terminados($id_terminado,$cantidad_ingreso){
    $conectar=parent::conexion();
    parent::set_names();

    $sql ="update lente_terminado set stock=? where id_terminado=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $cantidad_ingreso);
    $sql->bindValue(2, $id_terminado);
    $sql->execute(); 

  }

  public function valida_existe_barcode($new_code,$id_lente){
    $conectar=parent::conexion();
    parent::set_names();

    $sql = "select*from codigos_lentes where codigo=? or id_lente=?;";
    $sql= $conectar->prepare($sql);
    $sql->bindValue(1, $new_code);
    $sql->bindValue(2, $id_lente);
    $sql->execute();
    return $resultado=$sql->fetchAll();
  }

  public function valida_existe_cod_lente($id_terminado){
    $conectar=parent::conexion();
    parent::set_names();
    $sql = "select codigo from lente_terminado where id_terminado=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $id_terminado);
    $sql->execute();
    return $resultado=$sql->fetchAll();

  }

  public function insert_codigo_lente($new_code,$id_terminado_term){
    $conectar=parent::conexion();
    parent::set_names();
    $tipo_lente ="Terminado";
    $sql="insert into codigos_lentes values(?,?,?);";
    $sql= $conectar->prepare($sql);
    $sql->bindValue(1, $new_code);
    $sql->bindValue(2, $id_terminado_term);
    $sql->bindValue(3, $tipo_lente);
    $sql->execute();
    ///////////////////////////////////////////////////////////////////
    $sql2 ="update lente_terminado set codigo=? where id_terminado=?;";
    $sql2= $conectar->prepare($sql2);
    $sql2->bindValue(1, $new_code);
    $sql2->bindValue(2, $id_terminado_term);
    $sql2->execute();

  }


  public function valida_tipo_lente($codigo_lente){
    $conectar=parent::conexion();
    parent::set_names();
    $sql = "select*from codigos_lentes where codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo_lente);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }


  public function getInfoTerminado($codigo_lente){
    $conectar=parent::conexion();
    parent::set_names();
 
    $sql2 = "select t.marca,t.diseno,s.codigo,s.esfera,s.cilindro,s.stock from tablas_terminado as t inner join stock_terminados as s on t.id_tabla_term=s.id_tabla_term WHERE s.codigo=?;";
    $sql2 = $conectar->prepare($sql2);
    $sql2->bindValue(1, $codigo_lente);
    $sql2->execute();
    return $resultado = $sql2->fetchAll(PDO::FETCH_ASSOC);

  }

  public function registrarDescargo(){
    $conectar=parent::conexion();
    parent::set_names();
    $str = '';
    $array_od = array();
    $array_oi = array();    
    $array_od = json_decode($_POST["ojoDerechoArray"]);
    $array_oi = json_decode($_POST["ojoIzquierdoArray"]);

  }


public function getCodigoBarra($tipo_lente){
    $conectar=parent::conexion();
    parent::set_names();
    $sql = 'select codigo from codigos_lentes where tipo_lente=? and categoria="Interno" order by id_codigo desc limit 1;';
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $tipo_lente);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function registrarCodigo($codigo,$tipo_lente,$identificador){
    $conectar=parent::conexion();
    parent::set_names();
    $sql = 'insert into codigos_lentes values(null,?,?,?)';
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->bindValue(2, $identificador);
    $sql->bindValue(3, $tipo_lente);
    $sql->execute();
  }

/*-------------------- GET INFO DE BASE SIN ADICION ---------------------*/
  public function getInfoBases($codigo_lente){
    $conectar=parent::conexion();
    parent::set_names();
 
    $sql2 = "select t.marca,t.diseno,s.codigo,s.base,s.stock from tablas_base as t inner join stock_bases as s on t.id_tabla_base=s.id_tabla_base WHERE s.codigo=?;";
    $sql2 = $conectar->prepare($sql2);
    $sql2->bindValue(1, $codigo_lente);
    $sql2->execute();
    return $resultado = $sql2->fetchAll(PDO::FETCH_ASSOC);

  }

/*---------------- GET INFO BASES CON ADICION -------------------------------*/
public function getInfoBasesFlatop($codigo){
    $conectar=parent::conexion();
    parent::set_names();

    $sql = "select t.marca,t.diseno,s.codigo,s.base,s.adicion,s.stock,s.ojo from tablas_base as t inner join stock_bases_adicion as s on t.id_tabla_base=s.id_tabla_base WHERE s.codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function getCorrelativoLentesRotos($mes){

    $conectar=parent::conexion();
    parent::set_names();

    $mes_correlativo = $mes."%";
    $sql = "select n_reporte from lentes_rotos where fecha like ? order by id_reporte DESC limit 1;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $mes_correlativo);
    $sql->execute();

    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function getOperarios(){
    $conectar=parent::conexion();
    parent::set_names();

    $sql = "select nombres,codigo_emp from usuarios";
    $sql=$conectar->prepare($sql);
    $sql->execute();

    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_disenos_lentes($tipo_lente){
    $conectar=parent::conexion();
    parent::set_names();

    $sql = "select*from disenos_lente where categoria=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $tipo_lente);
    $sql->execute();

    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function validarExisteCorrelativoLr($n_reporte){
    $conectar=parent::conexion();
    parent::set_names();

    $sql ="select*from lentes_rotos where n_reporte=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $n_reporte);
    $sql->execute();

    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function registrarLentesRotos(){
    $conectar=parent::conexion();
    parent::set_names();

    $itemsLentesRotos = array();
    $itemsLentesRotos = json_decode($_POST["arrayItemsRotos"]);

    $paciente = $_POST["paciente"];
    $codigo_orden = $_POST["codigo_orden"];
    $id_optica = $_POST["id_optica"];
    $id_sucursal = $_POST["id_sucursal"];
    $id_usuario = $_POST["id_usuario"];
    $correlativo_lr = $_POST["correlativo_lr"];
    $motivo = $_POST["motivo"];
    $responsable = $_POST["responsable"];

    date_default_timezone_set('America/El_Salvador'); 
    $hoy = date("Y-m-d");
    $hora = date("H:i:s");

    $sql = "insert into lentes_rotos values(null,?,?,?,?,?,?,?);";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo_orden);
    $sql->bindValue(2, $responsable);
    $sql->bindValue(3, $id_usuario);
    $sql->bindValue(4, $motivo);
    $sql->bindValue(5, $hoy);
    $sql->bindValue(6, $hora);
    $sql->bindValue(7, $correlativo_lr);
    $sql->execute();
    $info_lente = "";
    foreach ($itemsLentesRotos as $key => $val) {
        $codigo = $val->codigo;
        $medidas = $val->medidas;
        $ojo = $val->ojo;
        $tipo_lente = $val->tipo_lente;
        
        $ojo == "derecho" ? $pref='<span style="color: blue">R: </span>' : $pref = "<span style='color: green'>L: </span>";
        $info_lente .= $pref.$tipo_lente." ".$medidas." ";


    if ($tipo_lente=="Base"){
        $sql2 = "select stock from stock_bases where codigo=?;";
        $sql2 = $conectar->prepare($sql2);
        $sql2->bindValue(1, $codigo);
        $sql2->execute();
        $stock =$sql2->fetchColumn();
        $nuevo_stock = $stock-1;

        $set_stock = "update stock_bases set stock=? where codigo=?;";
        $set_stock = $conectar->prepare($set_stock);
        $set_stock->bindValue(1,$nuevo_stock);
        $set_stock->bindValue(2,$codigo);
        $set_stock->execute();

    }elseif($tipo_lente=="Terminado"){
        $sql2 = "select stock from stock_terminados where codigo=?;";
        $sql2 = $conectar->prepare($sql2);
        $sql2->bindValue(1, $codigo);
        $sql2->execute();
        $stock = $sql2->fetchColumn();
        $nuevo_stock = $stock-1;

        $set_stock = "update stock_terminados set stock=? where codigo=?;";
        $set_stock = $conectar->prepare($set_stock);
        $set_stock->bindValue(1,$nuevo_stock);
        $set_stock->bindValue(2,$codigo);
        $set_stock->execute();
    }elseif($tipo_lente=="Base Flaptop"){
        $sql2 = "select stock from stock_bases_adicion where codigo=?;";
        $sql2 = $conectar->prepare($sql2);
        $sql2->bindValue(1, $codigo);
        $sql2->execute();
        $stock = $sql2->fetchColumn();
        $nuevo_stock = $stock-1;

        $set_stock = "update stock_bases_adicion set stock=? where codigo=?;";
        $set_stock = $conectar->prepare($set_stock);
        $set_stock->bindValue(1,$nuevo_stock);
        $set_stock->bindValue(2,$codigo);
        $set_stock->execute();

    }

    $sql3 = "select codigo_lente,medidas,tipo_lente from descargos where codigo_orden=? and ojo = ? order by id_descargo DESC limit 1";
    $sql3 = $conectar->prepare($sql3);
    $sql3->bindValue(1,$codigo_orden);
    $sql3->bindValue(2,$ojo);
    $sql3->execute();
    $resultados = $sql3->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultados as $value) {
        $codigo_lroto = $value["codigo_lente"];
        $medida_lr = $value["medidas"];
        $tipo_lente_lr = $value["tipo_lente"];
    }
    

    $sql4 = "insert into detalle_lentes_rotos values(null,?,?,?,?,?);";
    $sql4 = $conectar->prepare($sql4);
    $sql4->bindValue(1, $codigo_lroto);
    $sql4->bindValue(2, $correlativo_lr);
    $sql4->bindValue(3, $tipo_lente_lr." - ".$medida_lr);
    $sql4->bindValue(4, $codigo);
    $sql4->bindValue(5, $tipo_lente." - ".$medidas);
    $sql4->execute();

    $sql = "insert into descargos values(null,?,?,?,?,?,?,?,?,?,?);";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, parent::fechas());
    $sql->bindValue(2, $tipo_lente);
    $sql->bindValue(3, $codigo);
    $sql->bindValue(4, $ojo);
    $sql->bindValue(5, $paciente);
    $sql->bindValue(6, $medidas);
    $sql->bindValue(7, $codigo_orden);
    $sql->bindValue(8, $id_optica);
    $sql->bindValue(9, $id_sucursal);
    $sql->bindValue(10, $id_usuario);
    $sql->execute();

    ////////////////////OBETENER DATOS DE DESCARGO INICIAL
    $sql5 = "select codigo_lente,medidas,tipo_lente from descargos where codigo_orden=? and ojo = ? order by id_descargo ASC limit 1";
    $sql5 = $conectar->prepare($sql5);
    $sql5->bindValue(1,$codigo_orden);
    $sql5->bindValue(2,$ojo);
    $sql5->execute();
    $results = $sql5->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $value) {
        $codigo_lroto_ord = $value["codigo_lente"];
        $medida_lr_ord = $value["medidas"];
        $tipo_lente_lr_ord = $value["tipo_lente"];
    }

    ########################  OBETENER DEPARTAMENTO DEL RESPONSABLE ###################
    $resp = explode("-", $responsable);

    $sql7 = "select departamento from usuarios where nombres = ? and codigo_emp = ?;";
    $sql7 = $conectar->prepare($sql7);
    $sql7->bindValue(1, $resp[1]);
    $sql7->bindValue(2, $resp[0]);
    $sql7->execute();
    $departamentos = $sql7->fetchAll(PDO::FETCH_ASSOC);

    foreach ($departamentos as $k) {
        $depto = $k["departamento"];
    }


    $accion = "<span style='color:red'>Lente roto</span>";
    $observaciones = "<b>Dañado en: </b>".$depto;

    $sql6 = "insert into acciones_orden values(null,?,?,?,?,?);";
    $sql6 = $conectar->prepare($sql6);
    $sql6->bindValue(1, $codigo_orden);
    $sql6->bindValue(2, $hoy." ".$hora);
    $sql6->bindValue(3, $accion);
    $sql6->bindValue(4, $observaciones);
    $sql6->bindValue(5, $id_usuario);
    $sql6->execute();

    }/*Fin foreach*/

    $sql8 = "insert into acciones_orden values(null,?,?,?,?,?);";
    $sql8 = $conectar->prepare($sql8);
    $sql8->bindValue(1, $codigo_orden);
    $sql8->bindValue(2, $hoy." ".$hora);
    $sql8->bindValue(3, "Reposición lente dañado (Bodega)");
    $sql8->bindValue(4, $info_lente);
    $sql8->bindValue(5, $id_usuario);
    $sql8->execute();
}

public function listarLentesRotos(){
    $conectar= parent::conexion();
    parent::set_names();

    $sql="select u.usuario,l.n_orden,l.fecha,l.hora,l.reponsable,l.razon,dl.id_detalle_lr,dl.codigo_lente,dl.n_reporte,dl.especificaciones,dl.codigo_lente_repo,dl.especificaciones_repo from usuarios as u INNER JOIN lentes_rotos as l on u.id_usuario=l.reportado_por inner join detalle_lentes_rotos as dl on dl.n_reporte=l.n_reporte group by dl.id_detalle_lr order by dl.id_detalle_lr DESC;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

}////////////////////////// FIN DE LA CLASE  /////////////////


?>

  