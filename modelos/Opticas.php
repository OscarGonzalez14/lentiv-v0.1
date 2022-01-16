<?php 
require_once("../config/conexion.php");

class Opticas extends conectar {//inicio de la clase

////GUARDAR OPTICA
	public function guardar_optica($nom_optica,$num_optica,$id_usuario){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="insert into optica values(null,?,?,?);";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $nom_optica);
		$sql->bindValue(2, $num_optica);
		$sql->bindValue(3, $id_usuario);
		$sql->execute();
	}
//////VERIFICAR SI EXISTE OPTICA
	public function valida_existencia_optica($nom_optica,$num_optica){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="select * from optica WHERE nombre=? and telefono=?;";
		$sql= $conectar->prepare($sql);
		$sql->bindValue(1, $nom_optica);
		$sql->bindValue(2, $num_optica);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}

	////SELECT OPTICAS
	public function obtener_opticas(){
		$conectar= parent::conexion();
		$sql= "select * from optica;";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	//GENERAR CODIGO DINAMICO-SUCURSAL
	public function get_correlativo_sucursal(){
  $conectar= parent::conexion();
  $sql= "select codigo from sucursal_optica order by codigo DESC limit 1;";
  $sql=$conectar->prepare($sql);
  $sql->execute();
  return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

	///LISTAR OPTICAS SUCURSALES
	public function get_sucursales_opticas(){
		$conectar= parent::conexion();
		$sql= "select so.codigo, o.nombre, so.nombre_sucursal, so.id_sucursal, so.telefono, so.direccion from sucursal_optica as so JOIN optica as o WHERE so.id_optica=o.id_optica order by so.id_sucursal desc;";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	//VERIFICAR SI EXISTE OPTICA
	public function valida_existencia_sucursal($codigo){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="select * from sucursal_optica WHERE codigo=?;";
		$sql= $conectar->prepare($sql);
		$sql->bindValue(1, $codigo);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}

//GUARDAR SUCURSAL
	public function guardar_sucursal($nom_sucursal,$direccion,$telefono,$correo,$encargado,$codigo,$id_optica,$usuario){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="insert into sucursal_optica values(null,?,?,?,?,?,?,?,?);";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $nom_sucursal);
		$sql->bindValue(2, $direccion);
		$sql->bindValue(3, $telefono);
		$sql->bindValue(4, $correo);
		$sql->bindValue(5, $encargado);
		$sql->bindValue(6, $codigo);
		$sql->bindValue(7, $id_optica);
		$sql->bindValue(8, $usuario);
		$sql->execute();
	}

///MUESTRA LA INFORMACION DE SUCURSAL
	public function show_datos_sucursal($id_sucursal,$codigo){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="select * from sucursal_optica WHERE id_sucursal=? and codigo=?;";
		$sql= $conectar->prepare($sql);
		$sql->bindValue(1, $id_sucursal);
		$sql->bindValue(2, $codigo);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}

//VALIDACION PARA ELIMINAR SUCURSAL SI EXISTE ORDEN
   public function valida_sucursal_orden($id_sucursal){
    $conectar= parent::conexion();
    $sql="select*from orden where id_sucursal=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_sucursal);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  //FUNCION PARA ELIMINAR SUCURSAL
  public function eliminar_sucursal($id_sucursal){
    $conectar=parent::conexion();
    $sql="delete from sucursal_optica where id_sucursal=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_sucursal);
    $sql->execute();
    return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
  }

//EDITAR SUCURSAL
	public function editar_sucursal($nom_sucursal,$direccion,$telefono,$correo,$encargado,$codigo,$id_optica,$usuario,$id_sucursal){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="update sucursal_optica set nombre_sucursal=?,direccion=?,telefono=?,correo=?,encargado=?,codigo=?,id_optica=?,id_usuario=? where id_sucursal=?;";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $_POST["nom_sucursal"]);
		$sql->bindValue(2, $_POST["direccion"]);
		$sql->bindValue(3, $_POST["telefono"]);
		$sql->bindValue(4, $_POST["correo"]);
		$sql->bindValue(5, $_POST["encargado"]);
		$sql->bindValue(6, $_POST["codigo"]);
		$sql->bindValue(7, $_POST["id_optica"]);
		$sql->bindValue(8, $_POST["usuario"]);
		$sql->bindValue(9, $_POST["id_sucursal"]);
		$sql->execute();
	}

}//FIN class