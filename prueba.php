<?php

class Person {
  public function greet(){
    return "Hola $this->name";
  }
}

class User{
  public $type;
}

class Admin extends Person{
  public $name = 'Administrador';
}

$user = new User;
$user->type = new Admin;
echo $user->type->greet();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <script>
function verifica_seleccion(check){
    if(!check.checked){
        check.checked=1;
    }
}

  </script>
<form name="f1">
    <input type="checkbox" id="check1" name="check1" onchange="verifica_seleccion(this)" value="Check1">Check1
    <input type="checkbox" id="check2" name="check2" onchange="verifica_seleccion(this)" value="Check2" >Check2
    <input type="checkbox" id="check3" name="check3" onchange="verifica_seleccion(this)" value="Check3" >Check3
    <input type="submit" value="Enviar">
</form>
</body>
</html>