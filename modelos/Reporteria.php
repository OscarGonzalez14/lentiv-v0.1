<?php

require_once("../config/conexion.php");  

class Reporteria extends Conectar{

	public function get_optica_barcode($id_optica,$id_sucursal){
      $conectar=parent::conexion();
      parent::set_names();
      $sql="select o.nombre,s.direccion from optica as o inner join sucursal_optica as s on s.id_optica=o.id_optica where o.id_optica=? and s.id_sucursal=?;";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1,$id_optica);
      $sql->bindValue(2,$id_sucursal);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

///FUNCIONES DATOS ORDEN
public function get_datos_orden($codigo){
    $conectar = parent::conexion();
    parent::set_names();

    $sql = "select op.nombre AS optica,op.id_optica,s.direccion as sucursal,s.telefono,s.id_sucursal,o.paciente,o.observaciones,o.tipo_lente,o.trat_orden,o.codigo from orden as o inner join sucursal_optica as s on o.id_sucursal=s.id_sucursal INNER JOIN optica as op on op.id_optica= s.id_optica where o.codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

public function get_orden_rxfinal($codigo){
  $conectar = parent::conexion();
    parent::set_names();

    $sql = "select*from rx_orden where codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_alturas_orden($codigo){
  $conectar = parent::conexion();
  parent::set_names();

    $sql = "select*from alturas_orden where codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_det_aros_orden($codigo){
  $conectar = parent::conexion();
  parent::set_names();

    $sql = "select*from aro_orden where codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_tratamientos_orden($codigo){
  $conectar = parent::conexion();
  parent::set_names();

    $sql = "select tratamiento from tratamiento_orden where codigo=?;";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

}