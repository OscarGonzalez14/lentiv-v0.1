<?php

require_once("config/conexion.php");

class Login extends Conectar{

  public function permisos($id_usuario){
    $conectar=parent::conexion();
    parent::set_names();

    $sql="select * from usuario_permiso where id_usuario=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_usuario);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }
  
public function login_users(){
  $conectar=parent::conexion();
  parent::set_names();
  if(isset($_POST["enviar"])){
//********VALIDACIONES  DE ACCESO*****************
  $password = $_POST["pass"];
  $usuario = $_POST["usuario"];

  if(empty($usuario) or empty($password)){
      header("Location:index.php?m=2");
      exit();
    }else { 
      
    $sql= "select * from usuarios where usuario=? and pass=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->bindValue(2, $password);
        $sql->execute();
        $resultado = $sql->fetch();

    if(is_array($resultado) and count($resultado)>0){
        $_SESSION["id_usuario"] = $resultado["id_usuario"];           
        $_SESSION["usuario"] = $resultado["usuario"];
        $_SESSION["categoria"] = $resultado["categoria"];
        $_SESSION["codigo_emp"] = $resultado["codigo_emp"];

      $tokens=$this->permisos($resultado["id_usuario"]);
      $valores = array();
      foreach ($tokens as $value) {
        $valores[]=$value["id_permiso"];
      }
      in_array(1,$valores)?$_SESSION['ordenes']=1:$_SESSION['ordenes']=0;
      header("Location:vistas/home.php");
      exit();
    } else {                         
    //si no existe el registro entonces le aparece un mensaje
    header("Location:index.php?m=1");
    exit();
    } 
  }//cierre del else
  }//condicion enviar
}///FIN FUNCION LOGIN

}