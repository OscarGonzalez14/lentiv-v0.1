<?php
session_start();
class Conectar {

 	protected $dbh;
 	protected function conexion(){
 	try {
	    $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=lenti","root","");
		return $conectar;
    }catch (Exception $e) {
 			print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
 	}
	} //cierre de llave de la function conexion()


    public function set_names(){
		return $this->dbh->query("SET NAMES 'utf8'");
    }
	public function ruta(){
		return "localhost/lenti/";
	}

    //Función para convertir fecha del mes de numero al nombre, ejemplo de 01 a enero
	public static function convertir($string){
	    $string = str_replace(
	    array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
	    array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', ' DICIEMBRE'),$string);
	    return $string;
	}

	public static function fechas(){
		date_default_timezone_set('America/El_Salvador'); 
        $hoy = date("d-m-Y H:i:s");
        return $hoy;
	}

}
//######### cierre de llave conectar #####
########### TOKEN DE GITHUB ###############
// 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 //
?>