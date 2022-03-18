<?php
require_once("../config/conexion.php");
  
class Despachos extends Conectar{

    public $fecha = date("Y-m-d");
    public $hora = date( "H:i:s");

	public function registrarDespachoLab(){

	}
}