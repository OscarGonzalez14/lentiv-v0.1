<?php


     function convertir($string){
        $string = str_replace(
        array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
        array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', ' DICIEMBRE'),$string);
        return $string;
    }

    echo convertir('03');