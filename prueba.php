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
function getSelectItemThat(id) {
    for (var i = 1;i <= 4; i++)
    {
        document.getElementById(i).checked = false;
    }
    document.getElementById(id).checked = true;
}

  </script>
<input type="checkbox" id="1" value="laptop" onclick="getSelectItemThat(this.id)" /> Laptop 1
<input type="checkbox" id="2" value="mobile" onclick="getSelectItemThat(this.id)" /> Mobile 2
<input type="checkbox" id="3" value="computer" onclick="getSelectItemThat(this.id)" /> Computer 3
<input type="checkbox" id="4" value="lcd" onclick="getSelectItemThat(this.id)" /> LCD 4
</body>
</html>