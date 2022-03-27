<?php

require_once ('/var/www/_escpos/vendor/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

$connector = new FilePrintConnector ('php://stdout');
$printer = new Printer ($connector);

$printer->initialize();
$printer->text ("test\n");
$printer->close();