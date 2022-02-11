<?php 
require_once("../config/conexion.php");

class User extends Conectar {//inicio de la clase

  public function get_codigo_usuario(){
    $conectar= parent::conexion();
    $sql= "select codigo_emp from usuarios order by codigo_emp DESC limit 1;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  } 

    //validar existencia de usuario
  public function valida_existencia_usuarios($codigo,$fecha_ingreso){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="select * from usuarios WHERE codigo_emp=? and fecha_ingreso=?;";
    $sql= $conectar->prepare($sql);
    $sql->bindValue(1, $codigo);
    $sql->bindValue(2, $fecha_ingreso);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }

  ////GUARDAR OPTICA
  public function guardar_usuario($nombre,$telefono,$correo,$dui,$direccion,$usuario,$depto,$pass,$estado,$codigo,$nick,$nit,$isss,$afp,$cuenta,$fecha_ingreso){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="insert into usuarios values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $nombre);
    $sql->bindValue(2, $telefono);
    $sql->bindValue(3, $correo);
    $sql->bindValue(4, $dui);
    $sql->bindValue(5, $direccion);
    $sql->bindValue(6, $usuario);
    $sql->bindValue(7, $depto);
    $sql->bindValue(8, $pass);
    $sql->bindValue(9, $estado);
    $sql->bindValue(10, $codigo);
    $sql->bindValue(11, $nick);
    $sql->bindValue(12, $nit);
    $sql->bindValue(13, $isss);
    $sql->bindValue(14, $afp);
    $sql->bindValue(15, $cuenta);
    $sql->bindValue(16, $fecha_ingreso);
    $sql->execute();
  }

      ///LISTAR usuario lenti
  public function get_usuarios(){
    $conectar= parent::conexion();
    $sql= "select * from usuarios;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

//VER DATOS DEL USARIO
  public function ver_datos_usuario($id_user,$codigo_emp){
    $conectar= parent::conexion();
    $sql="select*from usuarios where id_usuario=? and codigo_emp=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_user);
    $sql->bindValue(2, $codigo_emp);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

//EDITAR USUARIOS
   public function editar_usuario($nombre,$telefono,$correo,$dui,$direccion,$usuario,$depto,$pass,$estado,$codigo,$nick,$nit,$isss,$afp,$cuenta,$fecha_ingreso,$id_user){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="update usuarios set nombre=?,telefono=?,correo=?,dui=?,direccion=?,usuario=?,departamento=?,pass=?,estado=?,nick=?,nit=?,isss=?,afp=?,cuenta_bancaria=? where codigo_emp=? and id_usuario=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $nombre);
    $sql->bindValue(2, $telefono);
    $sql->bindValue(3, $correo);
    $sql->bindValue(4, $dui);
    $sql->bindValue(5, $direccion);
    $sql->bindValue(6, $usuario);
    $sql->bindValue(7, $depto);
    $sql->bindValue(8, $pass);
    $sql->bindValue(9, $estado);
    $sql->bindValue(10, $nick);
    $sql->bindValue(11, $nit);
    $sql->bindValue(12, $isss);
    $sql->bindValue(13, $afp);
    $sql->bindValue(14, $cuenta);
    $sql->execute();
  } 


}//FIN class